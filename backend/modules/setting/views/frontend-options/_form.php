<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\startdata\Options;
use lbmzorx\components\behavior\StatusCode;
/* @var $this yii\web\View */
/* @var $model common\models\startdata\Options */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
    </div>
    <div class="panel-body">
<div class="options-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'type')->dropDownList(StatusCode::tranStatusCode(Options::$type_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'input_type')->dropDownList(StatusCode::tranStatusCode(Options::$input_type_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'autoload')->dropDownList(StatusCode::tranStatusCode(Options::$autoload_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'tips')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
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
