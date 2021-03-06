<?php
namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use lbmzorx\components\action\CreateAction;
use lbmzorx\components\action\ViewAction;
use lbmzorx\components\action\UpdateAction;
use lbmzorx\components\action\IndexAction;
use lbmzorx\components\action\DeleteAction;
use lbmzorx\components\action\SortAction;
use lbmzorx\components\action\ChangeStatusAction;

/**
 * BaseCommon implements the CRUD actions as base
 * Controller server for all CRUD and can not access directory.
 */
class BaseCommon extends Controller
{
    public function init(){
        parent::init();
        if(isset(\yii::$app->params['layout'])){
            $this->layout=\yii::$app->params['layout'];
        }
    }

    /**
     * Index Model Name , search model provide data in index action
     * If $modelNameIndexSearch is null, this model will be used
     * @var string $modelNameIndex
     */
    public $modelNameIndex='';
    /**
     * Search model provide index data,and simple search .
     * Should defined search function.
     * @var string $modelNameIndexSearch
     */
    public $modelNameIndexSearch='';
    /**
     * View Model , list of specific data
     * @var string $modelNameView
     */
    public $modelNameView='';
    /**
     * Create Model , Insert data into database
     * @var string $modelNameCreate
     */
    public $modelNameCreate='';
    /**
     * Update Model , Update record in database
     * @var string $modelNameUpdate
     */
    public $modelNameUpdate='';
    /**
     * Delete Model
     * @var string $modelNameDelete
     */
    public $modelNameDelete='';
    /**
     * Sort Model , set sort
     *
     * @var string $modelNameSort
     */
    public $modelNameSort='';
    /**
     * Change Status Model, update status code when need
     * @var string $modelNameChangeStatus
     */
    public $modelNameChangeStatus='';

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

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions=parent::actions();
        if($this->modelNameIndexSearch){
            $actions=array_merge($actions,[
                'index' => [
                    'class' => IndexAction::className(),
                    'data' => function(){
                        $searchModel = new $this->modelNameIndexSearch();
                        $dataProvider = $searchModel->search(Yii::$app->getRequest()->getQueryParams());
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    }
                ],
            ]);
        }elseif($this->modelNameIndex){
            $actions=array_merge($actions,[
                'index' => [
                    'class' => IndexAction::className(),
                    'data' => function(){
                        $dataProvider = new ActiveDataProvider([
                            'query' => ($this->modelNameIndex)::find(),
                        ]);
                        return [
                            'dataProvider' => $dataProvider,
                        ];
                    }
                ],
            ]);
        }
        if($this->modelNameCreate){
            $actions=array_merge($actions,[
            'create' => [
                'class' => CreateAction::className(),
                    'modelClass' =>$this->modelNameCreate,
                ],
            ]);
        }
        if($this->modelNameUpdate){
            $actions=array_merge($actions,[
                'update' => [
                    'class' => UpdateAction::className(),
                    'modelClass' => $this->modelNameUpdate,
                ],
            ]);
        }
        if($this->modelNameView){
            $actions=array_merge($actions,[
                'view' => [
                    'class' => ViewAction::className(),
                    'modelClass' => $this->modelNameView,
                ],
            ]);
        }
        if($this->modelNameDelete){
            $actions=array_merge($actions,[
                'delete' => [
                    'class' => DeleteAction::className(),
                    'modelClass' => $this->modelNameDelete,
                ],
            ]);
        }
        if($this->modelNameSort){
            $actions=array_merge($actions,[
                'sort' => [
                    'class' => SortAction::className(),
                    'modelClass' => $this->modelNameSort,
                ],
            ]);
        }
        if($this->modelNameChangeStatus){
            $actions=array_merge($actions,[
                'change-status'=>[
                    'class'=>ChangeStatusAction::className(),
                    'modelClass'=>$this->modelNameChangeStatus,
                ],
            ]);
        }
        return $actions;
    }
}
