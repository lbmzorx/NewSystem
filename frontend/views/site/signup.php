<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title =\yii::t('app','Signup') ;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-5" style="margin: 0 auto;float:none">
    <div class="site-signup">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style=""><?= Html::encode($this->title) ?></h2>
                <p><?=\yii::t('app','Welcome to DoubleFloor Space')?></p>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                        <?= $form->field($model, 'email') ?>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                        <?= $form->field($model, 'confirm_password')->passwordInput() ?>
                        <?= $form->field($model, 'verifyCode', [
                            'options' => ['class' => 'form-group input-group'],
                        ])->widget(\yii\captcha\Captcha::className(),[
                            'template' => "<div class='input-group'>{input}<span class='input-group-btn'>{image}</span></div>",
                            'imageOptions' => ['alt' => '验证码'],
                        ]); ?>
                        <div class="form-group">
                            <?= Html::submitButton(\yii::t('app','Signup'), ['class' => 'btn btn-primary btn-all', 'name' => 'signup-button','style'=>'width:100%;']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $pubkey=\lbmzorx\components\helper\Rsaenctype::getPubKey(true)?>
<?php $passwordId=Html::getInputId($model,'password')?>
<?php $passwordConfirmId=Html::getInputId($model,'confirm_password')?>
<?=$this->registerJs(<<<SCRYPT
var encrypt = new JSEncrypt();encrypt.setPublicKey('{$pubkey}');    
function do_encrypt(str) { return encrypt.encrypt(str);}
var count=1;
$('#form-signup').submit(function(){
    if(count==1){
         $('#{$passwordId}').val(do_encrypt($('#{$passwordId}').val().trim()));
         $('#{$passwordConfirmId}').val(do_encrypt($('#{$passwordConfirmId}').val().trim()));
    }
    count++;
});
SCRYPT
)?>