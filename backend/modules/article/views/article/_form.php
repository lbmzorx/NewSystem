<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\startdata\Article;
use lbmzorx\components\behavior\StatusCode;
/* @var $this yii\web\View */
/* @var $model common\models\startdata\Article */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
    </div>
    <div class="panel-body">
<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'article_content_id')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'user_id')->textInput() ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'article_cate_id')->textInput() ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'sort')->textInput() ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'cover')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'abstract')->textInput(['maxlength' => true]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'remain')->dropDownList(StatusCode::tranStatusCode(Article::$remain_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'auth')->dropDownList(StatusCode::tranStatusCode(Article::$auth_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'commit')->textInput(['maxlength' => true]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'view')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'collection')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'thumbup')->textInput() ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'level')->dropDownList(StatusCode::tranStatusCode(Article::$level_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'score')->textInput() ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'publish')->dropDownList(StatusCode::tranStatusCode(Article::$publish_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'status')->dropDownList(StatusCode::tranStatusCode(Article::$status_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'page_type')->dropDownList(StatusCode::tranStatusCode(Article::$page_type_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'flag_headline')->dropDownList(StatusCode::tranStatusCode(Article::$flag_headline_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'flag_recommend')->dropDownList(StatusCode::tranStatusCode(Article::$flag_recommend_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'flag_slide_show')->dropDownList(StatusCode::tranStatusCode(Article::$flag_slide_show_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'flag_special_recommend')->dropDownList(StatusCode::tranStatusCode(Article::$flag_special_recommend_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'flag_roll')->dropDownList(StatusCode::tranStatusCode(Article::$flag_roll_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'flag_bold')->dropDownList(StatusCode::tranStatusCode(Article::$flag_bold_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'flag_picture')->dropDownList(StatusCode::tranStatusCode(Article::$flag_picture_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'recycle')->dropDownList(StatusCode::tranStatusCode(Article::$recycle_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'admin_id')->textInput() ?>
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
