<?php
namespace common\models\admindata;

use Yii;
use common\models\admindatabase\Maintain as BaseModelMaintain;

/**
* This is the data class for [[common\models\admindatabase\Maintain]].
* Data model definde model behavior and status code.
* @see \common\models\admindatabase\Maintain
*/
class Maintain extends BaseModelMaintain
{

    const OPTIONS_TYPE_HOME_CAROUSEL_FIGURE=0;
    const OPTIONS_TYPE_LEFT_SIDE=1;
    const OPTIONS_TYPE_RIGHT_SIDE=2;
    /**
    * 位置类型
    * 位置类型.tran:0=首页轮播,1=侧栏1,2=侧栏.code:0=Home Carousel figure,1=Left Side,2=Right Side.
    * @var array $options_type_code
    */
    public static $options_type_code = [0=>'Home Carousel figure',1=>'Left Side',2=>'Right Side',];

    const STATUS_FORBBIDEN=0;
    const STATUS_AVAILABLE=1;
    /**
    * 状态
    * 状态.tran:0=禁用,1=启用.code:0=Forbbiden,1=Available.
    * @var array $status_code
    */
    public static $status_code = [0=>'Forbbiden',1=>'Available',];

    /**
     * get status code attribute list
     */
    public static function statusCodes(){
        return [
            'options_type','status'
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['options_type'], 'in', 'range' => [0,1,2,]],
            [['status'], 'in', 'range' => [0,1,]],
            [['options_type'], 'default', 'value' =>'0',],
            [['show_type','add_time','edit_time'], 'default', 'value' =>0,],
            [['status'], 'default', 'value' =>1,],
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
                'options_type',
                'show_type',
                'name',
                'value',
                'sign',
                'url',
                'info',
                'sort',
                'add_time',
                'edit_time',
                'status',
            ],
            'view' => [
                'id',
                'options_type',
                'show_type',
                'name',
                'value',
                'sign',
                'url',
                'info',
                'sort',
                'add_time',
                'edit_time',
                'status',
            ],
            'update' => [
                'options_type',
                'show_type',
                'name',
                'value',
                'sign',
                'url',
                'info',
                'sort',
                'status',
            ],
            'create' => [
                'options_type',
                'show_type',
                'name',
                'value',
                'sign',
                'url',
                'info',
                'sort',
                'status',
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
                'category' =>'astatuscode',
            ],
        ];
    }

    /**
     * If is tree which have parent_id
     * @return boolean
     */
    public static function isTree(){
        return false;
    }

}
