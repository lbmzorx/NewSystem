<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\admindata\AdminInfo;
use lbmzorx\components\behavior\StatusCode;
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */

\lbmzorx\components\assets\JsencryptAsset::register($this);

$this->title = Yii::t('app', 'Reset Password');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-info-create">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
    </div>
    <div class="panel-body">
<div class="admin-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <?= $form->field($model, 'oldPassword')->passwordInput()?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <?= $form->field($model, 'newPassword')->passwordInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <?= $form->field($model, 'confirmPassword')->passwordInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <?= $form->field($model, 'verifyCode', [
                'options' => ['class' => 'form-group input-group'],
            ])->widget(\yii\captcha\Captcha::className(),[
                'template' => "<div class='input-group'>{input}<span class='input-group-btn'>{image}</span></div>",
                'imageOptions' => ['alt' => '验证码'],
                'captchaAction'=>'/site/captcha',
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app',Yii::t('app', 'Save')), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
    </div>
</div>
</div>


<?php $pubkey=\lbmzorx\components\helper\Rsaenctype::getPubKey(true)?>
<?php
$formid=$form->id;
$oldPasswordId=Html::getInputId($model,'oldPassword');
$newPasswordId=Html::getInputId($model,'newPassword');
$confirmPasswordId=Html::getInputId($model,'confirmPassword');
?>

<?=$this->registerJs(<<<SCRYPT
var encrypt = new JSEncrypt();encrypt.setPublicKey('{$pubkey}');    
function do_encrypt(str) { return encrypt.encrypt(str);}
var count=1;
$('#{$formid}').submit(function(){
    if(count==1){
         $('#{$oldPasswordId}').val(do_encrypt($('#{$oldPasswordId}').val().trim()));
         $('#{$newPasswordId}').val(do_encrypt($('#{$newPasswordId}').val().trim()));
         $('#{$confirmPasswordId}').val(do_encrypt($('#{$confirmPasswordId}').val().trim()));
    }
    count++;
});
SCRYPT
)?>