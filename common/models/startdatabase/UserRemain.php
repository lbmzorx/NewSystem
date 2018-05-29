<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%user_remain}}".
 *
 * @property string $id	//
 * @property int $to_user_id	// 接收用户ID
 * @property int $from_user_id	// 来源用户ID
 * @property string $content	// 内容
 * @property int $remain_type	// 提醒类型.tran:0=评论,1=回答,2=回复,3=评价,4=收藏,5=点赞,6=访客,7=粉丝.code:0=Commit,1=Answer,2=Reply,4=Collection,5=Thumb Up,6=Visitor,7=Fans.
 * @property string $link	// 链接
 * @property string $title	// 标题
 * @property int $add_time	//
 */
class UserRemain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_remain}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['to_user_id', 'from_user_id', 'remain_type', 'add_time'], 'integer'],
            [['content'], 'string', 'max' => 255],
            [['link'], 'string', 'max' => 200],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'to_user_id' => Yii::t('model', 'To User ID'),
            'from_user_id' => Yii::t('model', 'From User ID'),
            'content' => Yii::t('model', 'Content'),
            'remain_type' => Yii::t('model', 'Remain Type'),
            'link' => Yii::t('model', 'Link'),
            'title' => Yii::t('model', 'Title'),
            'add_time' => Yii::t('model', 'Add Time'),
        ];
    }
}


