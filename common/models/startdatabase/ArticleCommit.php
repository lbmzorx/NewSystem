<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%article_commit}}".
 *
 * @property string $id	//
 * @property string $article_id	// 文章ID
 * @property string $user_id	// 用户ID
 * @property string $parent_id	// 父级ID
 * @property string $content	// 内容
 * @property int $status	// 状态.tran:0=待审核,1=评论成功,2=审核失败.code:0=Waiting audit,1=Audit Pass,2=Audit Failed.
 * @property string $add_time	// 添加时间
 * @property int $recycle	// 删除.tran:0=否,1=是.code:0=No,1=Yes.
 * @property int $level	// 级别
 * @property string $path	// 路径
 */
class ArticleCommit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_commit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'user_id', 'parent_id', 'content', 'add_time'], 'required'],
            [['article_id', 'user_id', 'parent_id', 'status', 'add_time', 'recycle', 'level'], 'integer'],
            [['content'], 'string', 'max' => 400],
            [['path'], 'string', 'max' => 255],
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
            'parent_id' => Yii::t('model', 'Parent ID'),
            'content' => Yii::t('model', 'Content'),
            'status' => Yii::t('model', 'Status'),
            'add_time' => Yii::t('model', 'Add Time'),
            'recycle' => Yii::t('model', 'Recycle'),
            'level' => Yii::t('model', 'Level'),
            'path' => Yii::t('model', 'Path'),
        ];
    }
}


