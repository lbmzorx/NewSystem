<?php
/**
 * Created by Administrator.
 * Date: 2018/6/9 21:20
 * github: https://github.com/lbmzorx
 */

namespace frontend\controllers;


use backend\models\Article;
use yii\base\Controller;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow'=>true,
                        'roles'=>['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex(){
        $user=\yii::$app->request->get('id')?:\yii::$app->user->id;

        $query=Article::find()->where([
            'status'=>Article::STATUS_AUDIT_PASSED,
            'publish'=>Article::PUBLISH_PUBLISHED,
            'auth'=>Article::AUTH_ALL_USERS,
        ])->andFilterWhere([
            'tag'=>\yii::$app->request->get('tag'),
            'user_id'=>$user,
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

}