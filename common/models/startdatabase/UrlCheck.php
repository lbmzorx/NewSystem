<?php

namespace common\models\startdatabase;

use Yii;

/**
 * This is the model class for table "{{%url_check}}".
 *
 * @property string $id	//
 * @property string $md5	// 校验值
 * @property string $url	// 链接
 * @property int $user_id	// 用户ID
 * @property string $ip	// 激活Ip
 * @property int $num	// 次数.
 * @property int $status	// 状态.tran:0=等待,1=已点击,2=失效.code:0=Waiting,1=Clicked,2=Useless.
 * @property string $auth_key	// 授权码
 * @property int $expire_time	// 失效时间
 * @property int $add_time	// 添加时间
 */
class UrlCheck extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%url_check}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['md5', 'url', 'user_id', 'auth_key', 'add_time'], 'required'],
            [['user_id', 'num', 'status', 'expire_time', 'add_time'], 'integer'],
            [['md5', 'url'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 128],
            [['auth_key'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'),
            'md5' => Yii::t('model', 'Md5'),
            'url' => Yii::t('model', 'Url'),
            'user_id' => Yii::t('model', 'User ID'),
            'ip' => Yii::t('model', 'Ip'),
            'num' => Yii::t('model', 'Num'),
            'status' => Yii::t('model', 'Status'),
            'auth_key' => Yii::t('model', 'Auth Key'),
            'expire_time' => Yii::t('model', 'Expire Time'),
            'add_time' => Yii::t('model', 'Add Time'),
        ];
    }
}


