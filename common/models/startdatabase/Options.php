<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%options}}".
 *
 * @property string $id	// 自增id
 * @property string $type	// 类型.tran:0=系统,1=自定义,2=banner,=3广告.code:0=System,1=Self,2=Banner,3=Ad.
 * @property string $name	// 标识符
 * @property string $value	// 值
 * @property int $input_type	// 输入框类型.code:0=input,1=texteare,2=img,3=markdown.tran:0=输入框,1=文本框,2=图片,3=Markdown
 * @property int $autoload	// 自动加载.tran:0=否,1=是.code:0=No,1=Yes.
 * @property string $tips	// 提示
 * @property string $sort	// 排序
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%options}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'input_type', 'autoload', 'sort'], 'integer'],
            [['name', 'value'], 'required'],
            [['value'], 'string'],
            [['name', 'tips'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'type' => Yii::t('model', 'Type'),
            'name' => Yii::t('model', 'Name'),
            'value' => Yii::t('model', 'Value'),
            'input_type' => Yii::t('model', 'Input Type'),
            'autoload' => Yii::t('model', 'Autoload'),
            'tips' => Yii::t('model', 'Tips'),
            'sort' => Yii::t('model', 'Sort'),
        ];
    }
}


