<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%admin_message_log}}".
 *
 * @property int $admin_message_id	//
 * @property int $admin_id	//
 */
class AdminMessageLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_message_log}}';
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
            [['admin_message_id', 'admin_id'], 'required'],
            [['admin_message_id', 'admin_id'], 'integer'],
            [['admin_message_id', 'admin_id'], 'unique', 'targetAttribute' => ['admin_message_id', 'admin_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_message_id' => Yii::t('amodel', 'Admin Message ID'),
            'admin_id' => Yii::t('amodel', 'Admin ID'),
        ];
    }
}


