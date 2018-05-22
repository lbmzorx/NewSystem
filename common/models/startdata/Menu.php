<?php
namespace common\models\startdata;

use Yii;
use common\models\startdatabase\Menu as BaseModelMenu;
use yii\caching\TagDependency;

/**
* This is the data class for [[common\models\startdatabase\Menu]].
* Data model definde model behavior and status code.
* @see \common\models\startdatabase\Menu
*/
class Menu extends BaseModelMenu
{
    /**
     * The cache tag
     */
    const CACHE_TAG='common_models_startdata_Menu';


    const POSITION_LEFT=0;
    const POSITION_TOP=1;
    const POSITION_RIGHT=2;
    const POSITION_BOTTON=3;
    /**
    * 位置
    * 位置.tran:0=左,1=上,2=右,3=下.code:0=Left,1=Top,2=Right,3=Botton.
    * @var array $position_code
    */
    public static $position_code = [0=>'Left',1=>'Top',2=>'Right',3=>'Botton',];

    const TARGET_NEW_TAG='_blank';
    const TARGET_SELF_WINDOW='_self';
    /**
    * 打开方式
    * 打开方式.tran:_blank=新窗口,_self=本窗口.code:_blank=New Tag,_self=Self Window
    * @var array $target_code
    */
    public static $target_code = ['_blank'=>'New Tag','_self'=>'Self Window',];

    const IS_ABSOLUTE_URL_NO=0;
    const IS_ABSOLUTE_URL_YES=1;
    /**
    * 是否绝对地址
    * 是否绝对地址.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $is_absolute_url_code
    */
    public static $is_absolute_url_code = [0=>'No',1=>'Yes',];

    const IS_DISPLAY_NO=0;
    const IS_DISPLAY_YES=1;
    /**
    * 是否显示
    * 是否显示.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $is_display_code
    */
    public static $is_display_code = [0=>'No',1=>'Yes',];

    const RECYCLE_NO=0;
    const RECYCLE_YES=1;
    /**
    * 删除
    * 删除.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $recycle_code
    */
    public static $recycle_code = [0=>'No',1=>'Yes',];

    /**
     * get status code attribute list
     */
    public static function statusCodes(){
        return [
            'position','target','is_absolute_url','is_display','recycle'
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['position'], 'in', 'range' => [0,1,2,3,]],
            [['target'], 'in', 'range' => ['_blank','_self',]],
            [['is_absolute_url','is_display','recycle'], 'in', 'range' => [0,1,]],
            [['position','sort','is_absolute_url','recycle'], 'default', 'value' =>0,],
            [['parent_id','edit_time'], 'default', 'value' =>'0',],
            [['icon'], 'default', 'value' =>'',],
            [['target'], 'default', 'value' =>'_self',],
            [['is_display'], 'default', 'value' =>1,],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'id',
                'position',
                'parent_id',
                'name',
                'url',
                'icon',
                'sort',
                'target',
                'is_absolute_url',
                'is_display',
                'recycle',
                'add_time',
                'edit_time',
            ],
            'search' => [
                'id',
                'position',
                'parent_id',
                'name',
                'url',
                'icon',
                'sort',
                'target',
                'is_absolute_url',
                'is_display',
                'recycle',
                'add_time',
                'edit_time',
            ],
            'view' => [
                'id',
                'position',
                'parent_id',
                'name',
                'url',
                'icon',
                'sort',
                'target',
                'is_absolute_url',
                'is_display',
                'recycle',
                'add_time',
                'edit_time',
            ],
            'update' => [
                'position',
                'parent_id',
                'name',
                'url',
                'icon',
                'sort',
                'target',
                'is_absolute_url',
                'is_display',
                'recycle',
            ],
            'create' => [
                'position',
                'parent_id',
                'name',
                'url',
                'icon',
                'sort',
                'target',
                'is_absolute_url',
                'is_display',
                'recycle',
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

    public function afterSave($insert , $changedAttributes)
    {
        TagDependency::invalidate(\yii::$app->cache,self::CACHE_TAG);
        parent::afterSave($insert , $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function afterDelete()
    {
        TagDependency::invalidate(\yii::$app->cache,self::CACHE_TAG);
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }

}
