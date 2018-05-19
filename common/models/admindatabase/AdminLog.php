<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%admin_log}}".
 *
 * @property string $id	// 自增id
 * @property string $admin_id	// 管理员用户id
 * @property string $route	// 操作路由
 * @property string $description	// 操作描述
 * @property string $add_time	// 添加时间
 * @property string $edit_time	// 修改时间
 */
class AdminLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_log}}';
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
            [['admin_id', 'add_time'], 'required'],
            [['admin_id', 'add_time', 'edit_time'], 'integer'],
            [['description'], 'string'],
            [['route'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('amodel', 'ID'),
            'admin_id' => Yii::t('amodel', 'Admin ID'),
            'route' => Yii::t('amodel', 'Route'),
            'description' => Yii::t('amodel', 'Description'),
            'add_time' => Yii::t('amodel', 'Add Time'),
            'edit_time' => Yii::t('amodel', 'Edit Time'),
        ];
    }
}


