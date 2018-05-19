<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%log}}".
 *
 * @property string $id	//
 * @property int $level	// 级别.tran:0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END.code:0x00=All,0x01=Error,0x02=Warning,0x04=Info,0x08=Trace,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
 * @property string $category	// 分类
 * @property double $log_time	// 记录时间
 * @property string $prefix	// 前缀
 * @property string $message	// 信息
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbadmin');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level'], 'integer'],
            [['log_time'], 'number'],
            [['prefix', 'message'], 'string'],
            [['category'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('amodel', 'ID'),
            'level' => Yii::t('amodel', 'Level'),
            'category' => Yii::t('amodel', 'Category'),
            'log_time' => Yii::t('amodel', 'Log Time'),
            'prefix' => Yii::t('amodel', 'Prefix'),
            'message' => Yii::t('amodel', 'Message'),
        ];
    }
}


