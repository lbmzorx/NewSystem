<?php
namespace frontend\controllers;

use frontend\models\ActivateForm;
use lbmzorx\components\action\FormAction;
use lbmzorx\components\helper\ModelHelper;
use common\models\startdata\Article;
use common\models\startdata\ArticleCate;
use frontend\models\ActiveAccount;
use Yii;
use yii\base\Exception;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\user\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $fontFile=[
            '@yii/captcha/SpicyRice.ttf',
            '@resource/captcha/ttfs/1.ttf',
            '@resource/captcha/ttfs/2.ttf',
            '@resource/captcha/ttfs/3.ttf',
            '@resource/captcha/ttfs/4.ttf',
            '@resource/captcha/ttfs/5.ttf',
            '@resource/captcha/ttfs/6.ttf',
        ];
        $backColor=rand(0x0,0xFFFFFF);
        $foreColor1=rand(0x0,$backColor);
        $foreColor2=rand($backColor,0xFFFFFF);
        $foreColor=abs($backColor-$foreColor1)>abs($backColor-$foreColor2)?$foreColor2:$foreColor1;

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'backColor'=>$backColor,
                'foreColor'=>$foreColor,
                'minLength'=>4,
                'maxLength'=>6,
                'height'=>36,
                'fontFile'=>$fontFile[rand(0,4)],
            ],
            'activate'=>[
                'class'=>FormAction::className(),
                'modelClass'=>ActivateForm::className(),
                'verifyMethod'=>'sendEmail',
                'successMsg'=>\yii::t('app','Congratulations! We have send an email to you account, please click it and activate you account'),
                'isErrorMsg'=>true,
                'successRedirectvView'=>'/site/login',
            ],
        ];
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->saveContact()) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                $str=VarDumper::dumpAsString($model);
                Yii::$app->session->setFlash('error', 'There was an error sending your message.'.$str);
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionActiveAccount(){
        $activeAccount=new ActiveAccount();
        $activeAccount->load(\yii::$app->request->get(),'');
        if( $activeAccount->validate() && $activeAccount->verifySign()){
            \yii::$app->session->addFlash('Success',\yii::t('app','Congratulations! You have successfully activated your account,please login!'));
            $this->redirect(['/site/login']);
        }
        \yii::$app->session->setFlash('error',ModelHelper::getErrorAsString($activeAccount,$activeAccount->getErrors()));
        return $this->render('active-account');
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', yii::t('app','Check your email for further instructions.'));
                return $this->redirect('/site/login');
            } else {
                Yii::$app->session->setFlash('error', yii::t('app','Sorry, we are unable to reset password for the provided email address.'));
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($date,$expire,$type,$sign)
    {
        try {
            $model = new ResetPasswordForm();
            $model->checkUrl($date,$expire,$type,$sign);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', \yii::t('app','New password saved.'));
            return $this->redirect('/site/login');
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
