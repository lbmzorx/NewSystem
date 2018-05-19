<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%migration}}".
 *
 * @property string $version	// 版本
 * @property int $apply_time	// 迁移时间
 */
class Migration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%migration}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['version'], 'required'],
            [['apply_time'], 'integer'],
            [['version'], 'string', 'max' => 180],
            [['version'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'version' => Yii::t('model', 'Version'),
            'apply_time' => Yii::t('model', 'Apply Time'),
        ];
    }
}


