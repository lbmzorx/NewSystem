<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%yii_log}}".
 *
 * @property string $id	//
 * @property int $level	// 级别.tran:0=所有,1=致命错误,2=警告,4=信息,8=追踪,64=PROFILE,80=PROFILE_BEGIN,96=PROFILE_END.code:0=All,1=Error,2=Warning,4=Info,8=Trace,64=PROFILE,80=PROFILE_BEGIN,96=PROFILE_END
 * @property string $category	// 分类
 * @property double $log_time	// 记录时间
 * @property string $prefix	// 前缀
 * @property string $message	// 信息
 */
class YiiLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yii_log}}';
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


