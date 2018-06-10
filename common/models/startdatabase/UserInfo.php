<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%user_info}}".
 *
 * @property int $id	//
 * @property string $user_id	// 用户ID
 * @property int $fans	// 粉丝数量
 * @property int $attention	// 关注
 * @property int $article	// 文章
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'required'],
            [['id', 'user_id', 'fans', 'attention', 'article'], 'integer'],
            [['id', 'user_id'], 'unique', 'targetAttribute' => ['id', 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'user_id' => Yii::t('model', 'User ID'),
            'fans' => Yii::t('model', 'Fans'),
            'attention' => Yii::t('model', 'Attention'),
            'article' => Yii::t('model', 'Article'),
        ];
    }
}


