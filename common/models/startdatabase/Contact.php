<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%contact}}".
 *
 * @property string $id	//
 * @property string $name	// 名称
 * @property string $email	// 邮箱
 * @property string $subject	// 主题
 * @property string $body	// 内容
 * @property string $ip	// IP
 * @property int $status	// 状态.tran:0=未读,1=已读.code:0=Unread,1=Read.
 * @property int $add_time	//
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contact}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'body'], 'required'],
            [['status', 'add_time'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['email', 'subject'], 'string', 'max' => 100],
            [['body'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'name' => Yii::t('model', 'Name'),
            'email' => Yii::t('model', 'Email'),
            'subject' => Yii::t('model', 'Subject'),
            'body' => Yii::t('model', 'Body'),
            'ip' => Yii::t('model', 'Ip'),
            'status' => Yii::t('model', 'Status'),
            'add_time' => Yii::t('model', 'Add Time'),
        ];
    }
}


