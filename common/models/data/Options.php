<?php
namespace common\models\data;

use Yii;
use common\models\data\Options as BaseModelOptions;

/**
* This is the data class for [[common\models\data\Options]].
* Data model definde model behavior and status code.
* @see \common\models\data\Options
*/
class Options extends BaseModelOptions
{

    const TYPE_SYSTEM=0;
    const TYPE_SELF=1;
    const TYPE_BANNER=2;
    const TYPE_AD=3;
    /**
    * 类型
    * 类型.tran:0=系统,1=自定义,2=banner,=3广告.code:0=System,1=Self,2=Banner,3=Ad.
    * @var array $type_code
    */
    public static $type_code = [0=>'System',1=>'Self',2=>'Banner',3=>'Ad',];

    const INPUT_TYPE_INPUT=0;
    const INPUT_TYPE_TEXTEARE=1;
    const INPUT_TYPE_IMG=2;
    const INPUT_TYPE_MARKDOWN=3;
    /**
    * 输入框类型
    * 输入框类型.code:0=input,1=texteare,2=img,3=markdown.tran:0=输入框,1=文本框,2=图片,3=Markdown
    * @var array $input_type_code
    */
    public static $input_type_code = [0=>'input',1=>'texteare',2=>'img',3=>'markdown',];

    const AUTOLOAD_NO=0;
    const AUTOLOAD_YES=1;
    /**
    * 自动加载
    * 自动加载.tran:0=否,1=是.code:0=No,1=Yes.
    * @var array $autoload_code
    */
    public static $autoload_code = [0=>'No',1=>'Yes',];

    /**
     * get status code attribute list
     */
    public static function statusCodes(){
        return [
            'type','input_type','autoload'
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['type','input_type'], 'in', 'range' => [0,1,2,3,]],
            [['autoload'], 'in', 'range' => [0,1,]],
            [['type','sort'], 'default', 'value' =>'0',],
            [['input_type','autoload'], 'default', 'value' =>1,],
            [['tips'], 'default', 'value' =>'',],
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
                'type',
                'name',
                'value',
                'input_type',
                'autoload',
                'tips',
                'sort',
            ],
            'view' => [
                'id',
                'type',
                'name',
                'value',
                'input_type',
                'autoload',
                'tips',
                'sort',
            ],
            'update' => [
                'type',
                'name',
                'value',
                'input_type',
                'autoload',
                'tips',
                'sort',
            ],
            'create' => [
                'type',
                'name',
                'value',
                'input_type',
                'autoload',
                'tips',
                'sort',
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'getStatusCode'=>[
                'class' => \lbmzorx\components\behavior\StatusCode::className(),
                'category' =>'statuscode',
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
