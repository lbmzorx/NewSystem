<?php

namespace common\models\admindatabase;

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
 * @property int $top_id	// 父级ID
 * @property string $module	// 模块
 * @property string $controller	// 控制器
 * @property string $action	// 方法
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
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbadmin');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'parent_id', 'is_absolute_url', 'is_display', 'recycle', 'add_time', 'edit_time', 'top_id'], 'integer'],
            [['name', 'url', 'add_time'], 'required'],
            [['sort'], 'number'],
            [['name', 'url', 'icon', 'target'], 'string', 'max' => 255],
            [['module', 'controller', 'action'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('amodel', 'ID'),
            'position' => Yii::t('amodel', 'Position'),
            'parent_id' => Yii::t('amodel', 'Parent ID'),
            'name' => Yii::t('amodel', 'Name'),
            'url' => Yii::t('amodel', 'Url'),
            'icon' => Yii::t('amodel', 'Icon'),
            'sort' => Yii::t('amodel', 'Sort'),
            'target' => Yii::t('amodel', 'Target'),
            'is_absolute_url' => Yii::t('amodel', 'Is Absolute Url'),
            'is_display' => Yii::t('amodel', 'Is Display'),
            'recycle' => Yii::t('amodel', 'Recycle'),
            'add_time' => Yii::t('amodel', 'Add Time'),
            'edit_time' => Yii::t('amodel', 'Edit Time'),
            'top_id' => Yii::t('amodel', 'Top ID'),
            'module' => Yii::t('amodel', 'Module'),
            'controller' => Yii::t('amodel', 'Controller'),
            'action' => Yii::t('amodel', 'Action'),
        ];
    }
}


