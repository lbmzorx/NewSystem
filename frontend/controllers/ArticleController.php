<?php
namespace frontend\controllers;

use common\models\startdata\Article;
use common\models\startdata\ArticleCate;
use frontend\models\ArticleForm;
use lbmzorx\components\helper\ModelHelper;
use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class ArticleController extends Controller
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
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $query=Article::find()->where([
            'status'=>Article::STATUS_AUDIT_PASSED,
            'publish'=>Article::PUBLISH_PUBLISHED,
            'auth'=>Article::AUTH_ALL_USERS,
        ]);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_DESC,
                    'id' => SORT_DESC,
                ]
            ],
        ]);
        return $this->render('index',['provider'=>$provider]);
    }

    public function actionCreate(){
        $articleForm=new ArticleForm();
        $request=\yii::$app->request;
        if($request->isPost){
            if( $articleForm->load($request->post()) && $articleForm->createArticle() ){
                $msg=\yii::t('app','Success create Article');
                \yii::$app->session->setFlash('success',$msg);
                $return=['status'=>true,'msg'=>$msg];
            }else{
                $msg=ModelHelper::getErrorAsString($articleForm,$articleForm->getErrors());
                \yii::$app->session->setFlash('error',$msg);
                $return=['status'=>false,'msg'=>$msg];
            }

            if($request->isAjax){
                return $return;
            }else{
                return $this->redirect(['article/index']);
            }
        }


        return $this->render('create',[
            'model'=>$articleForm,
        ]);
    }
}
