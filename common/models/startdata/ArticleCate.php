<?php
namespace common\models\startdata;

use Yii;
use common\models\startdatabase\ArticleCate as BaseModelArticleCate;

/**
* This is the data class for [[common\models\startdatabase\ArticleCate]].
* Data model definde model behavior and status code.
* @see \common\models\startdatabase\ArticleCate
*/
class ArticleCate extends BaseModelArticleCate
{

    const STATUS_AVALIABLE=0;
    const STATUS_UNAVALIABLE=1;
    const STATUS_RECYCLE=3;
    /**
    * 状态
    * 状态.tran:0=可用,1=不可用,2=回收.code:0=Avaliable,1=Unavaliable,3=Recycle.
    * @var array $status_code
    */
    public static $status_code = [0=>'Avaliable',1=>'Unavaliable',3=>'Recycle',];

    /**
     * get status code attribute list
     */
    public static function statusCodes(){
        return [
            'status'
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['status'], 'in', 'range' => [0,1,3,]],
            [['name'], 'default', 'value' =>'',],
            [['parent_id','add_time','edit_time','status','sort'], 'default', 'value' =>0,],
            [['path'], 'default', 'value' =>'0',],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'search' => [
                'id',
                'name',
                'parent_id',
                'add_time',
                'edit_time',
                'level',
                'path',
                'status',
                'sort',
            ],
            'view' => [
                'id',
                'name',
                'parent_id',
                'add_time',
                'edit_time',
                'level',
                'path',
                'status',
                'sort',
            ],
            'update' => [
                'name',
                'parent_id',
                'status',
                'sort',
            ],
            'create' => [
                'name',
                'parent_id',
                'status',
                'sort',
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'timeUpdate'=>[
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                    self::EVENT_BEFORE_UPDATE => ['edit_time'],
                ],
            ],
            'getStatusCode'=>[
                'class' => \lbmzorx\components\behavior\StatusCode::className(),
                'category' =>'statuscode',
            ],
            'parent_id'=>[
                'class'=>\yii\behaviors\AttributesBehavior::className(),
                'attributes'=>[
                    'parent_id'=>[
                        self::EVENT_BEFORE_INSERT=>[$this,'treeBuild'],
                        self::EVENT_BEFORE_UPDATE=>[$this,'treeBuild'],
                    ],
                ],
            ],
        ];
    }

    /**
     * If is tree which have parent_id
     * @return boolean
     */
    public static function isTree(){
        return true;
    }

    /**
     * Build tree
     * @return mixed
     */
    public function treeBuild($event, $attribute){
        if($this->$attribute==0){
            if($this->hasAttribute('level')) $this->level=0;
            if($this->hasAttribute('path')) $this->level=0;
        }else{
            $parent_model=self::findOne($this->$attribute);
            if($parent_model){
                if($this->hasAttribute('level')) $this->level=$parent_model->level+1;
                if($this->hasAttribute('path')) $this->path=$parent_model->path.','.$parent_model->id;
            }else{
                $this->$attribute=0;
                if($this->hasAttribute('level')) $this->level=0;
                if($this->hasAttribute('path')) $this->level=0;
            }
        }
        return $this->$attribute;
    }
}
