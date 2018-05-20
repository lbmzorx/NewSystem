<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\startdata\ArticleContent;
use lbmzorx\components\behavior\StatusCode;
/* @var $this yii\web\View */
/* @var $model common\models\startdata\ArticleContent */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
    </div>
    <div class="panel-body">
<div class="article-content-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'seo_description')->textInput(['maxlength' => true]) ?>
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
