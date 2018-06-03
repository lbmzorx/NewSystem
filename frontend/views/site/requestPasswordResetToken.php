<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = \yii::t('app','Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-5"  style="margin: 0 auto;float:none">
<div class="site-request-password-reset">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 style=""><?= Html::encode($this->title) ?></h2>
            <p><?=\yii::t('app','Please fill out your email. A link to reset password will be sent there.')?></p>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <?= $form->field($model,'email')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'verifyCode', [
                'options' => ['class' => 'form-group input-group'],
            ])->widget(\yii\captcha\Captcha::className(),[
                'template' => "<div class='input-group'>{input}<span class='input-group-btn'>{image}</span></div>",
                'imageOptions' => ['alt' => '验证码'],
            ]); ?>
            <div class="form-group">
                <?= Html::submitButton( \yii::t('app','Send'), ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
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
$('#login-form').submit(function(){
    if(count==1){
         $('#{$passwordId}').val(do_encrypt($('#{$passwordId}').val().trim()));
    }
    count++;
});
SCRYPT
)?>