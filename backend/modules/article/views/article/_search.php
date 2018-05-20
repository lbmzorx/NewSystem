<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use lbmzorx\components\behavior\StatusCode;
use common\models\startsearch\Article as SearchModel;
/* @var $this yii\web\View */
/* @var $model common\models\startsearch\Article */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss(<<<STYLE
.search-box .form-group{margin-bottom: 5px;line-height:0.2}
STYLE
        );
?>

<div class="article-search search-box">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

<div class="row">
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'id',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('id'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-id'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'article_content_id',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('article_content_id'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-article_content_id'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'user_id',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('user_id'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-user_id'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'article_cate_id',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('article_cate_id'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-article_cate_id'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'sort',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('sort'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-sort'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'title',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('title'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-title'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
</div>
<div class="row">
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'author',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('author'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-author'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'cover',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('cover'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-cover'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'abstract',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('abstract'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-abstract'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'remain',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('remain'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-remain'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$remain_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'auth',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('auth'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-auth'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$auth_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'tag',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('tag'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-tag'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
</div>
<div class="row">
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'commit',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('commit'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-commit'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'view',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('view'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-view'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'collection',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('collection'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-collection'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'thumbup',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('thumbup'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-thumbup'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'level',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('level'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-level'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$level_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'score',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('score'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-score'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
</div>
<div class="row">
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'publish',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('publish'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-publish'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$publish_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'status',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('status'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-status'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$status_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'page_type',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('page_type'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-page_type'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$page_type_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'add_time',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('add_time'),
            'isTime'=>true,
            'timeType'=>'datetime',
            'dateConfig'=>[
                'range'=>'~',
            ],
            'isTips'=>true,
            'tipsType'=>'layer',
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-add_time'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'edit_time',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('edit_time'),
            'isTime'=>true,
            'timeType'=>'datetime',
            'dateConfig'=>[
                'range'=>'~',
            ],
            'isTips'=>true,
            'tipsType'=>'layer',
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-edit_time'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'flag_headline',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('flag_headline'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-flag_headline'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$flag_headline_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
</div>
<div class="row">
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'flag_recommend',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('flag_recommend'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-flag_recommend'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$flag_recommend_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'flag_slide_show',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('flag_slide_show'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-flag_slide_show'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$flag_slide_show_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'flag_special_recommend',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('flag_special_recommend'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-flag_special_recommend'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$flag_special_recommend_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'flag_roll',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('flag_roll'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-flag_roll'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$flag_roll_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'flag_bold',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('flag_bold'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-flag_bold'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$flag_bold_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'flag_picture',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('flag_picture'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-flag_picture'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$flag_picture_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
</div>
<div class="row">
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'recycle',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('recycle'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-recycle'],
        ])->dropDownList(StatusCode::tranStatusCode( SearchModel::$recycle_code,'app'),['prompt'=>\Yii::t('app','Please Select')])
        ->label('');?>
	</div>
	<div class="col-lg-2 col-sm-2">
		<?=$form->field($model, 'admin_id',[
            'class'=>\lbmzorx\components\widget\InputAddField::className(),
            'firstContent'=>$model->getAttributeLabel('admin_id'),
            'firstOption'=>['id'=>'icon-show-'.\yii\helpers\StringHelper::basename(get_class($model)).'-admin_id'],
        ])->textInput(['maxlength' => true])
        ->label('');?>
	</div>
</div>    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
