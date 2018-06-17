<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%user_message_group_content}}".
 *
 * @property string $id	//
 * @property string $content	// 消息内容
 */
class UserMessageGroupContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_message_group_content}}';
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
            [['content'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('amodel', 'ID'),
            'content' => Yii::t('amodel', 'Content'),
        ];
    }
}


