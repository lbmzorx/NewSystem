<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%maintain}}".
 *
 * @property string $id	//
 * @property string $options_type	// 位置类型.tran:0=首页轮播,1=侧栏1,2=侧栏.code:0=Home Carousel figure,1=Left Side,2=Right Side.
 * @property int $show_type	// 显示类型.tran:0=图片,2=文字,3=Markdown.0=Image,2=Textarea,3=Markdown.
 * @property string $name	// 名称
 * @property string $value	// 值
 * @property string $sign	// 标识
 * @property string $url	// URL
 * @property string $info	// 备注
 * @property int $sort	// 排序
 * @property int $add_time	// 添加时间
 * @property int $edit_time	// 修改时间
 * @property int $status	// 状态.tran:0=禁用,1=启用.code:0=Forbbiden,1=Available.
 */
class Maintain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%maintain}}';
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
            [['options_type', 'show_type', 'sort', 'add_time', 'edit_time', 'status'], 'integer'],
            [['name', 'value', 'sign', 'url', 'info', 'sort'], 'required'],
            [['name', 'sign'], 'string', 'max' => 50],
            [['value', 'url', 'info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('amodel', 'ID'),
            'options_type' => Yii::t('amodel', 'Options Type'),
            'show_type' => Yii::t('amodel', 'Show Type'),
            'name' => Yii::t('amodel', 'Name'),
            'value' => Yii::t('amodel', 'Value'),
            'sign' => Yii::t('amodel', 'Sign'),
            'url' => Yii::t('amodel', 'Url'),
            'info' => Yii::t('amodel', 'Info'),
            'sort' => Yii::t('amodel', 'Sort'),
            'add_time' => Yii::t('amodel', 'Add Time'),
            'edit_time' => Yii::t('amodel', 'Edit Time'),
            'status' => Yii::t('amodel', 'Status'),
        ];
    }
}


