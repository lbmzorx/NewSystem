<?php
namespace common\models\admindata;

use Yii;
use common\models\admindatabase\Log as BaseModelLog;

/**
* This is the data class for [[common\models\admindatabase\Log]].
* Data model definde model behavior and status code.
* @see \common\models\admindatabase\Log
*/
class Log extends BaseModelLog
{

    const LEVEL_ALL='0x00';
    const LEVEL_ERROR='0x01';
    const LEVEL_WARNING='0x02';
    const LEVEL_INFO='0x04';
    const LEVEL_TRACE='0x08';
    const LEVEL_PROFILE='0x40';
    const LEVEL_PROFILE_BEGIN='0x50';
    const LEVEL_PROFILE_END='0x60';
    /**
    * 级别
    * 级别.tran:0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END.code:0x00=All,0x01=Error,0x02=Warning,0x04=Info,0x08=Trace,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
    * @var array $level_code
    */
    public static $level_code = ['0x00'=>'All','0x01'=>'Error','0x02'=>'Warning','0x04'=>'Info','0x08'=>'Trace','0x40'=>'PROFILE','0x50'=>'PROFILE_BEGIN','0x60'=>'PROFILE_END',];

    /**
     * get status code attribute list
     */
    public static function statusCodes(){
        return [
            'level'
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['level'], 'in', 'range' => ['0x00','0x01','0x02','0x04','0x08','0x40','0x50','0x60',]],
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
                'level',
                'category',
                'log_time',
                'prefix',
                'message',
            ],
            'view' => [
                'id',
                'level',
                'category',
                'log_time',
                'prefix',
                'message',
            ],
            'update' => [
                'level',
                'category',
                'log_time',
                'prefix',
                'message',
            ],
            'create' => [
                'level',
                'category',
                'log_time',
                'prefix',
                'message',
            ],
        ];
    }

    public function behaviors()
    {
        return [
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
