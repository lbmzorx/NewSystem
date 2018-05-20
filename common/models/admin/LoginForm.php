<?php
namespace common\models\admin;


use lbmzorx\components\behavior\LimitLogin;
use lbmzorx\components\behavior\RsaAttribute;
use Yii;
use yii\base\Model;
use lbmzorx\components\event\LoginEvent;
use yii\web\HttpException;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe=true;

    /**
     * @var Admin
     */
    private $_user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required',],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['rememberMe','boolean'],
        ];
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
            if (!$user || !$user->validatePassword($this->$attribute)) {
                $this->addError($attribute, \Yii::t('model','Incorrect username or password!'.$this->$attribute));
            }
        }
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
            $status = Yii::$app->user->login($this->getUser(),$this->rememberMe ? 3600 * 24 * 30 : 0);
            $this->trigger(LoginEvent::EVENT_SUCCESS_LOGIN,$loginEvent);

            return $status;
        } else {
            var_dump($this->getErrors());
            $this->trigger(LoginEvent::EVENT_FAILED_LOGIN,$loginEvent);
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return Admin User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Admin::findByUsername($this->username);
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
