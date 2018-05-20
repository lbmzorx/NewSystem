<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\admindata\Maintain;
use lbmzorx\components\behavior\StatusCode;
/* @var $this yii\web\View */
/* @var $model common\models\admindata\Maintain */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
    </div>
    <div class="panel-body">
<div class="maintain-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'options_type')->dropDownList(StatusCode::tranStatusCode(Maintain::$options_type_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'show_type')->textInput() ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'sign')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'info')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'sort')->textInput() ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'status')->dropDownList(StatusCode::tranStatusCode(Maintain::$status_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
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
