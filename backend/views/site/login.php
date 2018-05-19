<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\admin\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <?=\yii::$app->security->generatePasswordHash('1234569')?>
                            <div class="logo text-center"><img src="/img/logo-main.png" alt="Klorofil Logo"></div>
                            <p class="lead"><?=Html::encode($this->title)?></p>
                        </div>
                        <?php $form = ActiveForm::begin(['id' => 'login-form','class'=>'form-auth-small']); ?>
                        <div class="form-group">
                            <?= $form->field($model, 'username')
                                ->label('账号',['class'=>'control-label sr-only','for'=>'signin-username'])
                                ->textInput(['autofocus' => true,'class'=>'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'password')
                                ->label('密码',['class'=>'control-label sr-only','for'=>'signin-password'])
                                ->passwordInput() ?>
                        </div>
                        <div class="form-group clearfix">
                            <label class="fancy-checkbox element-left pull-left">
                                <input type="checkbox" name="LoginForm[rememberMe]">
                                <span>Remember me</span>
                            </label>
                        </div>
                        <?= Html::submitButton('登录',['class' =>'btn btn-primary btn-lg btn-block','name' =>'login-button']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">重楼 后台</h1>
                        <p>by The Develovers</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?=$this->render('//widgets/_flash')?>
<?php $pubkey=\lbmzorx\components\helper\Rsaenctype::getPubKey(true)?>
<?php $passwordId=Html::getInputId($model,'password')?>
<?=$this->registerJs(<<<SCRYPT
var encrypt = new JSEncrypt();encrypt.setPublicKey('{$pubkey}');    
function do_encrypt(str) { return encrypt.encrypt(str);}
var count=1;
$('#login-form').submit(function(){
    if(count==1){
         $('#{$passwordId}').val(do_encrypt($('#{$passwordId}').val().trim()));
    }
    count++;
});
SCRYPT
)?>