<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%article_cate}}".
 *
 * @property string $id	//
 * @property string $name	// 名称
 * @property int $parent_id	// 父级ID
 * @property int $add_time	// 添加时间
 * @property int $edit_time	// 修改时间
 * @property int $level	// 级别
 * @property string $path	// 路径
 * @property int $status	// 状态.tran:0=可用,1=不可用,2=回收.code:0=Avaliable,1=Unavaliable,3=Recycle.
 * @property int $sort	// 排序
 */
class ArticleCate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_cate}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'add_time', 'edit_time', 'level', 'status', 'sort'], 'integer'],
            [['level'], 'required'],
            [['name'], 'string', 'max' => 50],
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
            'name' => Yii::t('model', 'Name'),
            'parent_id' => Yii::t('model', 'Parent ID'),
            'add_time' => Yii::t('model', 'Add Time'),
            'edit_time' => Yii::t('model', 'Edit Time'),
            'level' => Yii::t('model', 'Level'),
            'path' => Yii::t('model', 'Path'),
            'status' => Yii::t('model', 'Status'),
            'sort' => Yii::t('model', 'Sort'),
        ];
    }
}


