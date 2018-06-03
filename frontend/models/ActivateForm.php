<?php
namespace frontend\models;

use common\components\event\EmailEvent;
use common\components\helper\SignHelper;
use common\models\startdata\UrlCheck;
use lbmzorx\components\behavior\LimitLogin;
use lbmzorx\components\behavior\RsaAttribute;
use yii\base\Exception;
use yii\base\Model;
use common\models\user\User;
use Yii;
use yii\helpers\Url;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class ActivateForm extends Model
{
    public $username;
    public $verifyCode;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'exist', 'targetClass' => '\common\models\user\User','targetAttribute'=>['username','email','mobile'],'message' =>\yii::t('app','This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 50],

            ['verifyCode','captcha'],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     * @var $user User
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        if(preg_match('/^1[\d]{10}$/',$this->username)){
            $user = User::findOne([
                'status' => User::STATUS_WAITING_ACTIVE,
                'mobile' => $this->username,
            ]);
        }elseif(preg_match('/^[^@]*<[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?>$/',$this->username)){
            $user = User::findOne([
                'status' =>User::STATUS_WAITING_ACTIVE,
                'email' => $this->username,
            ]);
        }else{
            $user = User::findOne([
                'status' =>User::STATUS_WAITING_ACTIVE,
                'username' => $this->username,
            ]);
        }

        /* @var $user User */
        if (!$user) {
            return false;
        }


        $emailEvent=new EmailEvent();
        $this->trigger(EmailEvent::EVENT_BEFORE_EMAIL,$emailEvent);
        $linkParams=SignHelper::signSecretKey(['type'=>'user-signup','expire'=>strtotime('+7 day')],$user->getAuthKey(),true,true);
        if($linkParams!=false){
            array_unshift($linkParams,'site/active-account');
            $link=Url::to($linkParams,true);
            $urlCheck=new UrlCheck();
            $urlCheck->setScenario('create');
            $urlCheck->url=$link;
            $urlCheck->md5=$linkParams['sign'];
            $urlCheck->user_id=$user->id;
            $urlCheck->expire_time=strtotime('+7 day');
            $urlCheck->status=UrlCheck::STATUS_WAITING;
            $urlCheck->auth_key=$user->getAuthKey();
            if($urlCheck->save()){
                $mail= Yii::$app
                    ->mailer
                    ->compose(
                        ['html' => 'signup-html', 'text' => 'signup-text'],
                        [
                            'user' => $user,
                            'link'=>$link,
                            'expire'=>$urlCheck->expire_time,
                        ]
                    )
                    ->setFrom(Yii::$app->params['supportEmail'])
                    ->setTo($this->email)
                    ->setSubject(\yii::t('app','Welcome signup {name} click link and activate you account!',[
                        'name'=>\yii::t('app',Yii::$app->name),
                    ]))
                    ->send();
                if($mail){
                    $this->trigger(EmailEvent::EVENT_SUCCESS_EMAIL,$emailEvent);
                }
                return $mail;
            }
        }
        $this->addError('email',Yii::t('app','Can\'t create email for activate you account , please checkout you email !'));
        return false;
    }
}
