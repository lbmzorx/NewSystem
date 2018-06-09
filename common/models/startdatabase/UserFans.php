<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%user_fans}}".
 *
 * @property int $attention_id	// 被关注者
 * @property int $fans_id	// 粉丝
 */
class UserFans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_fans}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attention_id', 'fans_id'], 'required'],
            [['attention_id', 'fans_id'], 'integer'],
            [['attention_id', 'fans_id'], 'unique', 'targetAttribute' => ['attention_id', 'fans_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attention_id' => Yii::t('model', 'Attention ID'),
            'fans_id' => Yii::t('model', 'Fans ID'),
        ];
    }
}


