<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ActivateForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title =\yii::t('app','Activate') ;
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
                        <?php $form = ActiveForm::begin(['id' => 'form-activate']); ?>
                        <?= $form->field($model, 'username')->textInput(['placeholder' => \yii::t('app','user name/mobile/email')])?>
                        <?= $form->field($model, 'verifyCode', [
                            'options' => ['class' => 'form-group input-group'],
                        ])->widget(\yii\captcha\Captcha::className(),[
                            'template' => "<div class='input-group'>{input}<span class='input-group-btn'>{image}</span></div>",
                            'imageOptions' => ['alt' => '验证码'],
                        ]); ?>
                        <div class="form-group">
                            <?= Html::submitButton(\yii::t('app','Activate'), ['class' => 'btn btn-primary btn-all', 'name' => 'signup-button','style'=>'width:100%;']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>