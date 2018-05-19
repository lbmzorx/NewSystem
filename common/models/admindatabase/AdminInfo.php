<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%admin_info}}".
 *
 * @property string $id	//
 * @property int $admin_id	// 管理员ID
 * @property string $real_name	// 实名
 * @property int $sex	// 性别.tran:0=女,1=男.code:0=Female,1=Male.
 * @property string $birthday	// 生日
 * @property string $province	// 省
 * @property string $city	// 市
 * @property string $county	// 县/区
 * @property string $address	// 详细地址
 * @property string $identified_card	// 身份证
 * @property int $status	// 状态.tran:0=未实名,1=已实名.code:0=Un Real Name,1=Real Name.
 * @property string $qq	// QQ
 * @property string $wechat	// 微信
 * @property string $weibo	// 微博
 * @property string $other_mongodb	// 其他信息
 * @property int $add_time	// 添加时间
 * @property int $edit_time	// 修改时间
 */
class AdminInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_info}}';
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
            [['admin_id'], 'required'],
            [['admin_id', 'sex', 'status', 'add_time', 'edit_time'], 'integer'],
            [['real_name'], 'string', 'max' => 50],
            [['birthday', 'province', 'city', 'county', 'wechat', 'weibo'], 'string', 'max' => 20],
            [['address', 'other_mongodb'], 'string', 'max' => 255],
            [['identified_card'], 'string', 'max' => 18],
            [['qq'], 'string', 'max' => 12],
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
            'real_name' => Yii::t('amodel', 'Real Name'),
            'sex' => Yii::t('amodel', 'Sex'),
            'birthday' => Yii::t('amodel', 'Birthday'),
            'province' => Yii::t('amodel', 'Province'),
            'city' => Yii::t('amodel', 'City'),
            'county' => Yii::t('amodel', 'County'),
            'address' => Yii::t('amodel', 'Address'),
            'identified_card' => Yii::t('amodel', 'Identified Card'),
            'status' => Yii::t('amodel', 'Status'),
            'qq' => Yii::t('amodel', 'Qq'),
            'wechat' => Yii::t('amodel', 'Wechat'),
            'weibo' => Yii::t('amodel', 'Weibo'),
            'other_mongodb' => Yii::t('amodel', 'Other Mongodb'),
            'add_time' => Yii::t('amodel', 'Add Time'),
            'edit_time' => Yii::t('amodel', 'Edit Time'),
        ];
    }
}


