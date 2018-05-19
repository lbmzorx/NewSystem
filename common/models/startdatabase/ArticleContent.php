<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%article_content}}".
 *
 * @property string $id	//
 * @property string $content	// 内容
 * @property string $seo_title	// seo标题
 * @property string $seo_keywords	// seo关键字
 * @property string $seo_description	// seo描述
 */
class ArticleContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
            [['seo_title', 'seo_keywords', 'seo_description'], 'string', 'max' => 255],
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
            'seo_title' => Yii::t('model', 'Seo Title'),
            'seo_keywords' => Yii::t('model', 'Seo Keywords'),
            'seo_description' => Yii::t('model', 'Seo Description'),
        ];
    }
}


