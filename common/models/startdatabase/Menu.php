<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property string $id	//
 * @property int $position	// 位置.tran:0=左,1=上,2=右,3=下.code:0=Left,1=Top,2=Right,3=Botton.
 * @property string $parent_id	// 父级id
 * @property string $name	// 名称
 * @property string $url	// url地址
 * @property string $icon	// 图标
 * @property double $sort	// 排序
 * @property string $target	// 打开方式.tran:_blank=新窗口,_self=本窗口.code:_blank=New Tag,_self=Self Window
 * @property int $is_absolute_url	// 是否绝对地址.tran:0=否,1=是.code:0=No,1=Yes.
 * @property int $is_display	// 是否显示.tran:0=否,1=是.code:0=No,1=Yes.
 * @property int $recycle	// 删除.tran:0=否,1=是.code:0=No,1=Yes.
 * @property string $add_time	// 添加时间
 * @property string $edit_time	// 修改时间
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'parent_id', 'is_absolute_url', 'is_display', 'recycle', 'add_time', 'edit_time'], 'integer'],
            [['name', 'url', 'add_time'], 'required'],
            [['sort'], 'number'],
            [['name', 'url', 'icon', 'target'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'position' => Yii::t('model', 'Position'),
            'parent_id' => Yii::t('model', 'Parent ID'),
            'name' => Yii::t('model', 'Name'),
            'url' => Yii::t('model', 'Url'),
            'icon' => Yii::t('model', 'Icon'),
            'sort' => Yii::t('model', 'Sort'),
            'target' => Yii::t('model', 'Target'),
            'is_absolute_url' => Yii::t('model', 'Is Absolute Url'),
            'is_display' => Yii::t('model', 'Is Display'),
            'recycle' => Yii::t('model', 'Recycle'),
            'add_time' => Yii::t('model', 'Add Time'),
            'edit_time' => Yii::t('model', 'Edit Time'),
        ];
    }
}


