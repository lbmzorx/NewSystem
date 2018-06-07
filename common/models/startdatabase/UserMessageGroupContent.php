<?php

namespace common\models\startdatabase;

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
            'id' => Yii::t('model', 'ID'),
            'content' => Yii::t('model', 'Content'),
        ];
    }
}


