<?php
namespace chat\models\user;

use common\models\user\User;
use lbmzorx\components\behavior\LimitLogin;
use lbmzorx\components\behavior\RsaAttribute;
use lbmzorx\components\event\LoginEvent;
use Yii;
use yii\base\Model;
use yii\web\HttpException;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;

    private $_user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, \yii::t('app','Incorrect username or password'));
            }
        }
    }

    public function behaviors()
    {
        return [
            'bs_rsa'=>[
                'class'=>RsaAttribute::className(),
                'rsaAtAttributes'=>'password',
            ],
            'check_login'=>[
                'class'=>LimitLogin::className(),
                'attribute'=>'password',
            ],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        $loginEvent =new LoginEvent();
        try{
            $this->trigger(LoginEvent::EVENT_BEFORE_LOGIN,$loginEvent);
        }catch (HttpException $e){
            return false;
        }

        if ($this->validate()) {
            $this->trigger(LoginEvent::EVENT_SUCCESS_LOGIN,$loginEvent);
            $authKey=$this->getUser()->generateAuthKey();
            $this->getUser()->save();
            return $authKey;
        } else {
            $this->trigger(LoginEvent::EVENT_FAILED_LOGIN,$loginEvent);
            return false;
        }
    }


    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('amodel', 'Username'),
            'password' => Yii::t('amodel', 'Password'),
            'rememberMe' => Yii::t('amodel', 'Remember Me'),
        ];
    }
}
