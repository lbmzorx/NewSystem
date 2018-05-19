<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%article_thumbup}}".
 *
 * @property string $id	//
 * @property string $article_id	// 文章ID
 * @property string $user_id	// 用户ID
 * @property string $add_time	// 添加时间
 */
class ArticleThumbup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_thumbup}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'user_id', 'add_time'], 'required'],
            [['article_id', 'user_id', 'add_time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'article_id' => Yii::t('model', 'Article ID'),
            'user_id' => Yii::t('model', 'User ID'),
            'add_time' => Yii::t('model', 'Add Time'),
        ];
    }
}


