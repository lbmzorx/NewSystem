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
        return [
            'error' => [
                'class' => 'lbmzorx\components\action\ErrorAction',
                'guestView'=>\yii::$app->params['guest_layout'],
                'userView'=>\yii::$app->params['layout'],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

//        throw new Exception(VarDumper::dumpAsString($this->findLayoutFile($this->getView())));
        return $this->render('index');
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
