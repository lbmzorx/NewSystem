<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = \yii::t('app','Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-5" style="margin: 0 auto;float:none">
    <div class="site-reset-password">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style=""><?= Html::encode($this->title) ?></h2>
                <p><?=\yii::t('app','You need reset you password and remember it.')?></p>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                        <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
                        <div class="form-group">
                            <?= Html::submitButton(\yii::t('app','Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button','style'=>'width:100%;']) ?>
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
<?php $formid=$form->id?>
<?=$this->registerJs(<<<SCRYPT
var encrypt = new JSEncrypt();encrypt.setPublicKey('{$pubkey}');    
function do_encrypt(str) { return encrypt.encrypt(str);}
var count=1;
$('#{$formid}').submit(function(){
    if(count==1){
         $('#{$passwordId}').val(do_encrypt($('#{$passwordId}').val().trim()));
    }
    count++;
});
SCRYPT
)?>