<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%attack_ip}}".
 *
 * @property string $ip	// Ip地址
 * @property int $is_limit	// 是否限制.tran:0=否,1=是.code:0=No,1=Yes
 */
class AttackIp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attack_ip}}';
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
            [['ip'], 'required'],
            [['is_limit'], 'integer'],
            [['ip'], 'string', 'max' => 128],
            [['ip'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ip' => Yii::t('amodel', 'Ip'),
            'is_limit' => Yii::t('amodel', 'Is Limit'),
        ];
    }
}


