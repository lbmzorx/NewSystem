<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%auth_rule}}".
 *
 * @property string $name	// 名称
 * @property resource $data	// 数据
 * @property int $created_at	// 添加时间
 * @property int $updated_at	// 修改时间
 */
class AuthRule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_rule}}';
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
            [['name'], 'required'],
            [['data'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
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
            'data' => Yii::t('amodel', 'Data'),
            'created_at' => Yii::t('amodel', 'Created At'),
            'updated_at' => Yii::t('amodel', 'Updated At'),
        ];
    }
}


