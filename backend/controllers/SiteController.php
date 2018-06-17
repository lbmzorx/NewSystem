<?php
namespace backend\controllers;

use lbmzorx\components\event\LoginEvent;
use Yii;
use yii\base\Exception;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\admin\LoginForm;

/**
 * Site controller
 */
class SiteController extends Base
{
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
                'class' => 'lbmzorx\components\action\ErrorAction',
                'guestView'=>'error-guest',
                'userView'=>'error-user',
                'guestLayout'=>\yii::$app->params['guest_layout'],
                'userLayout'=>\yii::$app->params['layout'],
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'backColor'=>$backColor,
                'foreColor'=>$foreColor,
                'minLength'=>4,
                'maxLength'=>6,
                'height'=>34,
                'fontFile'=>$fontFile[rand(0,4)],
            ],
        ];
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if(\yii::$app->params['login_layout']){
            $this->layout=\yii::$app->params['login_layout'];
        }

        if(!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->trigger(LoginEvent::EVENT_BEFORE_LOGIN,new LoginEvent());
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            \yii::$app->getSession()->setFlash('Success',Yii::t('app','Login Success!'));
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
