<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%attention}}".
 *
 * @property string $id	//
 * @property string $name	// 名称
 * @property string $value	// 值
 * @property string $sign	// 标识
 * @property int $sort	// 排序
 */
class Attention extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attention}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value', 'sign'], 'required'],
            [['sort'], 'integer'],
            [['name', 'value'], 'string', 'max' => 255],
            [['sign'], 'string', 'max' => 50],
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
            'value' => Yii::t('model', 'Value'),
            'sign' => Yii::t('model', 'Sign'),
            'sort' => Yii::t('model', 'Sort'),
        ];
    }
}


