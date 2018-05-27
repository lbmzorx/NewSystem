<?php

namespace frontend\models;

use common\components\event\ContactEvent;
use common\models\admindata\AdminMessage;
use common\models\startdata\Contact;
use lbmzorx\components\helper\ModelHelper;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name'=>\yii::t('model','Name'),
            'email'=>\yii::t('model','Email'),
            'subject'=>\yii::t('model','Subject'),
            'body'=>\yii::t('model','Body'),
            'verifyCode' => \yii::t('app','Verification Code'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo([$this->email => $this->name])
            ->setFrom($email)
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }

    public function saveContact(){
        $event=new ContactEvent();
        $this->trigger(ContactEvent::EVENT_BEFORE_CONTACT,$event);

        $contact=new Contact();
        $contact->setScenario('create');
        $contact->load($this->getAttributes(),'');
        if(!$contact->save()){
            $this->addError('body',ModelHelper::getErrorAsString($contact,$contact->getErrors()));
            $this->trigger(ContactEvent::EVENT_FAILED_CONTACT,$event);
           return false;
        }

        $msg=new AdminMessage();
        $msg->setScenario('create');
        $msg->load([
            'spread_type'=>AdminMessage::SPREAD_TYPE_BROADCAST,
            'level'=>AdminMessage::LEVEL_1STAR,
            'name'=>$this->name,
            'content'=>$this->body,
            'read'=>AdminMessage::READ_UNREAD,
            'from_type'=>AdminMessage::FROM_TYPE_GUEST,
        ],'');
        if(!$msg->save()){
            $this->addError('body',ModelHelper::getErrorAsString($msg,$msg->getErrors()));
            $this->trigger(ContactEvent::EVENT_FAILED_CONTACT,$event);
            return false;
        }
        $this->trigger(ContactEvent::EVENT_SUCCESS_CONTACT,$event);
        return true;
    }
}
