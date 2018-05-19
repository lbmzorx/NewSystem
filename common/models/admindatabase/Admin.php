<?php

namespace common\models\admindatabase;

use Yii;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property int $id	//
 * @property string $username	// 用户名
 * @property string $auth_key	// 授权码
 * @property string $password_hash	// 密码
 * @property string $password_reset_token	// 重置密码口令
 * @property string $email	// 邮箱
 * @property int $status	// 状态.tran:0=删除,1=冻结,2=未通过审核,3=限制登录,4=限制活动,5=登录异常,6=激活失败,9=未激活,10=正常.code:0=Delete,1=Freeze,2=Waiting audit,3=Limit Login,4=Limit Active,5=Login Error,6=Active Error,9=Waiting Active,10=Active.
 * @property int $created_at	// 添加时间
 * @property int $updated_at	// 修改时间
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
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
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('amodel', 'ID'),
            'username' => Yii::t('amodel', 'Username'),
            'auth_key' => Yii::t('amodel', 'Auth Key'),
            'password_hash' => Yii::t('amodel', 'Password Hash'),
            'password_reset_token' => Yii::t('amodel', 'Password Reset Token'),
            'email' => Yii::t('amodel', 'Email'),
            'status' => Yii::t('amodel', 'Status'),
            'created_at' => Yii::t('amodel', 'Created At'),
            'updated_at' => Yii::t('amodel', 'Updated At'),
        ];
    }
}


