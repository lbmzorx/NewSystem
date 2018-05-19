<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%auth_item}}".
 *
 * @property string $name	// 名称
 * @property int $type	// 类型
 * @property string $description	// 描述
 * @property string $rule_name	// 规则名
 * @property resource $data	// 数据
 * @property int $created_at	// 添加时间
 * @property int $updated_at	// 修改时间
 */
class AuthItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_item}}';
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
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('amodel', 'Name'),
            'type' => Yii::t('amodel', 'Type'),
            'description' => Yii::t('amodel', 'Description'),
            'rule_name' => Yii::t('amodel', 'Rule Name'),
            'data' => Yii::t('amodel', 'Data'),
            'created_at' => Yii::t('amodel', 'Created At'),
            'updated_at' => Yii::t('amodel', 'Updated At'),
        ];
    }
}


