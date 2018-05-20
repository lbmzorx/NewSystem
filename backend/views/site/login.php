<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\admin\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<?php $rememberMe=Html::getInputId($model,'rememberMe')?>


<html lang="en" class="fullscreen-bg">

<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><img src="/img/logo-main.png" alt="Klorofil Logo"></div>
                            <p class="lead"><?=\yii::t('app','Login to your account')?></p>
                        </div>
                        <?php $form = ActiveForm::begin(['id' => 'login-form','class'=>'form-auth-small']); ?>
                        <div class="form-group">
                            <?= $form->field($model, 'username')
                                ->label(\yii::t('app','Username'),['class'=>'control-label sr-only','for'=>'signin-username'])
                                ->textInput(['autofocus' => true,'class'=>'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'password')
                                ->label(\yii::t('app','Password'),['class'=>'control-label sr-only','for'=>'signin-password'])
                                ->passwordInput() ?>
                        </div>
                        <div class="form-group clearfix">
                            <label class="fancy-checkbox element-left pull-left">
                                <input type="checkbox" name="LoginForm[rememberMe]" id="<?=$rememberMe?>" value="0">
                                <span><?=\yii::t('app','Remember Me')?></span>
                            </label>
                        </div>
                        <?= Html::submitButton(\yii::t('app','Login'),['class' =>'btn btn-primary btn-lg btn-block','name' =>'login-button']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">重楼</h1>
                        <p>by The Develovers</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<?php $pubkey=\lbmzorx\components\helper\Rsaenctype::getPubKey(true)?>
<?php $passwordId=Html::getInputId($model,'password')?>

<?=$this->registerJs(<<<SCRYPT
var encrypt = new JSEncrypt();encrypt.setPublicKey('{$pubkey}');    
function do_encrypt(str) { return encrypt.encrypt(str);}
var count=1;
$('#$rememberMe').click(function(){
    if($(this).prop('checked')){
    $(this).val(1);
    }else{
    $(this).val(0);
    }
});
$('#login-form').submit(function(){
    if(count==1){
         $('#{$passwordId}').val(do_encrypt($('#{$passwordId}').val().trim()));
    }
    count++;
});
SCRYPT
)?>