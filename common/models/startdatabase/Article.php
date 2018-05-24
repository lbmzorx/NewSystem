<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property string $id	//
 * @property string $article_content_id	// 文章内容
 * @property int $user_id	// 用户ID
 * @property int $article_cate_id	// 分类ID
 * @property int $sort	// 排序
 * @property string $title	// 标题
 * @property string $author	// 作者
 * @property string $cover	// 封面
 * @property string $abstract	// 摘要
 * @property int $remain	// 提醒.code:0=Not Reminding,1=Remained.tran:0=未提醒，1=已提醒
 * @property int $auth	// 权限.tran:0=所有人,1=好友,2=加密,3=自己.code:0=All Users,1=Friend,2=Encrypt,3=Private
 * @property string $tag	// 标签
 * @property string $commit	// 评论
 * @property string $view	// 浏览
 * @property string $collection	// 收藏
 * @property int $thumbup	// 赞
 * @property int $level	// 文章级别.tran:0=垃圾,1=较差,2=普通,3=较好,4=优秀,5=天才.code:0=Garbage,1=Non nutritive,2=General,3=Better,4=Good,5=Genius.
 * @property int $score	// 评分
 * @property int $publish	// 发布.tran:0=草稿,1=发布.code:0=Unpublished,1=Published.
 * @property int $status	// 状态值.tran:0=待审核,1=审核通过,2=正在审核,3=审核不通过.code:0=Waiting Audit,1=Audit Passed,2=Auditing,3=Audit Failed.
 * @property int $page_type	// 显示类型.tran:0=多页,1=单页.code:0=Multi Pages,1=Single Page
 * @property int $add_time	// 添加时间
 * @property int $edit_time	// 编辑时间
 * @property int $flag_headline	// 头条.tran:0=否,1=是.code:0=No,1=Yes.
 * @property int $flag_recommend	// 推荐.tran:0=否,1=是.code:0=No,1=Yes.
 * @property int $flag_slide_show	// 幻灯.tran:0=否,1=是.code:0=No,1=Yes.
 * @property int $flag_special_recommend	// 特别推荐.tran:0=否,1=是.code:0=No,1=Yes.
 * @property int $flag_roll	// 滚动.tran:0=否,1=是.code:0=No,1=Yes.
 * @property int $flag_bold	// 加粗.tran:0=否,1=是.code:0=No,1=Yes.
 * @property int $flag_picture	// 图片.tran:0=否,1=是.code:0=No,1=Yes.
 * @property int $recycle	// 删除.tran:0=否,1=是.code:0=No,1=Yes.
 * @property int $admin_id	// 管理员ID
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_content_id', 'title', 'author'], 'required'],
            [['article_content_id', 'user_id', 'article_cate_id', 'sort', 'remain', 'auth', 'commit', 'view', 'collection', 'thumbup', 'level', 'score', 'publish', 'status', 'page_type', 'add_time', 'edit_time', 'flag_headline', 'flag_recommend', 'flag_slide_show', 'flag_special_recommend', 'flag_roll', 'flag_bold', 'flag_picture', 'recycle', 'admin_id'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['author', 'cover', 'abstract'], 'string', 'max' => 255],
            [['tag'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'article_content_id' => Yii::t('model', 'Article Content ID'),
            'user_id' => Yii::t('model', 'User ID'),
            'article_cate_id' => Yii::t('model', 'Article Cate ID'),
            'sort' => Yii::t('model', 'Sort'),
            'title' => Yii::t('model', 'Title'),
            'author' => Yii::t('model', 'Author'),
            'cover' => Yii::t('model', 'Cover'),
            'abstract' => Yii::t('model', 'Abstract'),
            'remain' => Yii::t('model', 'Remain'),
            'auth' => Yii::t('model', 'Auth'),
            'tag' => Yii::t('model', 'Tag'),
            'commit' => Yii::t('model', 'Commit'),
            'view' => Yii::t('model', 'View'),
            'collection' => Yii::t('model', 'Collection'),
            'thumbup' => Yii::t('model', 'Thumbup'),
            'level' => Yii::t('model', 'Level'),
            'score' => Yii::t('model', 'Score'),
            'publish' => Yii::t('model', 'Publish'),
            'status' => Yii::t('model', 'Status'),
            'page_type' => Yii::t('model', 'Page Type'),
            'add_time' => Yii::t('model', 'Add Time'),
            'edit_time' => Yii::t('model', 'Edit Time'),
            'flag_headline' => Yii::t('model', 'Flag Headline'),
            'flag_recommend' => Yii::t('model', 'Flag Recommend'),
            'flag_slide_show' => Yii::t('model', 'Flag Slide Show'),
            'flag_special_recommend' => Yii::t('model', 'Flag Special Recommend'),
            'flag_roll' => Yii::t('model', 'Flag Roll'),
            'flag_bold' => Yii::t('model', 'Flag Bold'),
            'flag_picture' => Yii::t('model', 'Flag Picture'),
            'recycle' => Yii::t('model', 'Recycle'),
            'admin_id' => Yii::t('model', 'Admin ID'),
        ];
    }
}


