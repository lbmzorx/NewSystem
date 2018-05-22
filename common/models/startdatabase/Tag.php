<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property string $id	//
 * @property string $name	// 名称
 * @property int $frequence	// 频率
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['frequence'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'frequence' => Yii::t('model', 'Frequence'),
        ];
    }
}


