<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\startdata\Article;
use lbmzorx\components\behavior\StatusCode;
use lbmzorx\components\helper\TreeHelper;
use common\models\startdata\ArticleCate;
/* @var $this yii\web\View */
/* @var $model common\models\startdata\Article */
/* @var $ArticleContent common\models\startdata\ArticleContent */
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
                <div class="col-lg-6 col-sm-6">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <?= $form->field($model, 'article_cate_id')->dropDownList(
                                TreeHelper::treeArray(TreeHelper::array_cate_as_subarray(
                                    ArticleCate::find()
                                        ->select('id,name,parent_id')
                                        ->asArray()
                                        ->indexBy('id')->all(),0,'parent_id')
                                ),
                                ['format'=>'raw','prompt'=>\Yii::t('app','Please Select')]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'cover',[
                                'class'=>\lbmzorx\components\widget\UploadImgField::className(),
                                'jsOptions'=>[
                                    'urlUpload'=>\yii\helpers\Url::to(['upload']),
                                    'field'=>'UploadImg[imageFile]',
                                ],
                            ])->fileInput([]);?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'sort')->textInput() ?>
                        </div>
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
                            <?= $form->field($model, 'recycle')->dropDownList(StatusCode::tranStatusCode(Article::$recycle_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'level')->dropDownList(StatusCode::tranStatusCode(Article::$level_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                        </div>

                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'remain')->dropDownList(StatusCode::tranStatusCode(Article::$remain_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'auth')->dropDownList(StatusCode::tranStatusCode(Article::$auth_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'score')->textInput() ?>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <?= $form->field($model, 'tag',[
                                'class'=>\lbmzorx\components\widget\DoubleSelect::className(),
                                'itemsSelect'=>[
                                    yii::t('app','New Input'),
                                    yii::t('app','Build From Select'),
                                ],
                                'inputSelectOptions'=>['id'=>'article_tag-radio'],
                            ])->textInput(['maxlength' => true])
                                ->hiddenDropList(Article::groupTags(),['prompt'=>\Yii::t('app','Please Select')])?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <?= $form->field($ArticleContent, 'seo_title')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <?= $form->field($ArticleContent, 'seo_keywords')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <?= $form->field($ArticleContent, 'seo_description')->textarea(['maxlength' => true]) ?>
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
                            <?= $form->field($model, 'flag_headline')->dropDownList(StatusCode::tranStatusCode(Article::$flag_headline_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'flag_recommend')->dropDownList(StatusCode::tranStatusCode(Article::$flag_recommend_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'flag_slide_show')->dropDownList(StatusCode::tranStatusCode(Article::$flag_slide_show_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'flag_special_recommend')->dropDownList(StatusCode::tranStatusCode(Article::$flag_special_recommend_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <?= $form->field($model, 'abstract')->textarea(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <?= $form->field($ArticleContent, 'content',[
                        'class'=>\lbmzorx\components\widget\EditorMdField::className(),
                        'mdJsOptions'=>[
                            'placeholder'=>'请输入内容',
                        ],
                    ])->textarea();?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'publish')->dropDownList(StatusCode::tranStatusCode(Article::$publish_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'status')->dropDownList(StatusCode::tranStatusCode(Article::$status_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="col-lg-3 col-sm-3">
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app',Yii::t('app', 'Save')), ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>