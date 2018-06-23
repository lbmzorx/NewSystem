<?php
namespace frontend\controllers;

use common\models\startdata\Article;
use common\models\startdata\ArticleCate;
use common\models\startdata\ArticleCollection;
use common\models\startdata\ArticleThumbup;
use common\models\tool\UploadImg;
use frontend\models\ArticleCommitForm;
use frontend\models\ArticleForm;
use lbmzorx\components\action\UploadAction;
use lbmzorx\components\helper\ModelHelper;
use Symfony\Component\CssSelector\Tests\Parser\ReaderTest;
use Yii;
use yii\base\Exception;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;

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
                'only'=>['create','update','thumbup','collection','commit'],
                'rules' => [
                    [
                        'actions' => ['create','update','thumbup','collection','commit'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' =>  ['create','update','thumbup','collection','commit'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'view'   => ['GET'],
                    'create' => ['GET', 'PUT', 'POST'],
                    'update' => ['GET', 'PUT', 'POST'],
                    'thumbup' => ['PUT', 'POST'],
                    'collection' => ['PUT', 'POST'],
                    'commit'=>['POST'],
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
            'upload'=>[
                'class'=>UploadAction::className(),
                'modelClass' => Article::className(),
                'imgAttribute'=>'imageFile',
                'imgClass'=>UploadImg::className(),
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
        ])->andFilterWhere([
            'tag'=>\yii::$app->request->get('tag'),
            'user_id'=>\yii::$app->request->get('user_id'),
            'article_cate_id'=>\yii::$app->request->get('cate_id'),
        ])->with('user');
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
                'pageParam'=>'page',
                'pageSizeParam'=>'per-page',
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
                if($return['status']){
                    return $this->redirect(['/user/index']);
                }
            }
        }

        return $this->render('create',[
            'model'=>$articleForm,
            'title'=>\yii::t('app','Create Article'),
        ]);
    }

    public function actionUpdate($id){
        $articleForm=new ArticleForm();
        $request=\yii::$app->request;
        if($request->isPost){
            if( $articleForm->load($request->post()) && $articleForm->updateArticle($id) ){
                $msg=\yii::t('app','Success update Article');
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
                if($return['status']){
                    return $this->redirect(['/user/index']);
                }
            }
        }
        if($articleForm->findArticle($id)==false){
            \yii::$app->session->addFlash('error',\yii::t('app','This Article is not Exist!'));
            return $this->redirect('/user/index');
        }
        return $this->render('create',[
            'model'=>$articleForm,
            'title'=>\yii::t('app','Update Article'),
        ]);
    }

    public function actionView($id){
        $article=Article::findOne($id);
        $article->updateCounters(['view'=>1]);
        $commitForm=new ArticleCommitForm();
        return $this->render('view',['model'=>$article,'commitForm'=>$commitForm]);
    }

    public function actionThumbup(){
        \yii::$app->response->format=Response::FORMAT_JSON;
        $request=\yii::$app->request;
        $article_id=$request->getBodyParam('article_id');
        $user_id=\yii::$app->user->id;
        return ArticleThumbup::UserThumbup($article_id,$user_id);
    }

    public function actionCollection(){
        \yii::$app->response->format=Response::FORMAT_JSON;
        $request=\yii::$app->request;
        $article_id=$request->getBodyParam('article_id');
        $user_id=\yii::$app->user->id;
        return ArticleCollection::UserCollection($article_id,$user_id);
    }

    public function actionCommit(){
        $model = new ArticleCommitForm();
        if($model->load(\yii::$app->request->post())&&$model->validate()&&$model->createArticleCommit()){
            $status=true;
            $msg=\yii::t('app','Reply Success!');
        }else{
            $status=false;
            $msg=ModelHelper::getErrorAsString($model,$model->getErrors());
        }

        if(\yii::$app->request->isAjax){
            \yii::$app->response->format=Response::FORMAT_JSON;
            return ['status'=>$status,'msg'=>$msg];
        }else{
            if($status){
                \yii::$app->session->setFlash('success',$msg);
            }else{
                \yii::$app->session->setFlash('',$msg);
            }
            return $this->redirect(\yii::$app->request->referrer);
        }
    }

}
