<?php

/* @var $this yii\web\View */
/* @var $model \yii\base\Model */
use \lbmzorx\components\helper\TreeHelper;
use common\models\startdata\ArticleCate;
$this->title = \yii::t('app','Create Article');
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 ">
            <?php $form = \yii\widgets\ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
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
                <div class="col-lg-6 col-sm-6">
                    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'content',[
                        'class'=>\lbmzorx\components\widget\EditorMdField::className(),
                        'mdJsOptions'=>[
                            'placeholder'=>'请输入内容',
                        ],
                    ])->textarea();?>
                </div>
            </div>
            <?php \yii\widgets\ActiveForm::end(); ?>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 " id="side-box">
            <?=\frontend\widget\PulishAttensionWidget::widget([
                    'title'=>\yii::t('app','Attention'),
                    'options'=>[
                        'class'=>'panel panel-default',
                        'id'=>'article-attention-box'
                    ],
            ])?>
            <?=\frontend\widget\ArticleCateWidget::widget([
                'options'=>[
                    'class'=>'panel panel-default',
                    'id'=>'article-box'
                ],

            ])?>
            <?=\frontend\widget\TagWidget::widget([
                'options'=>[
                    'class'=>'panel panel-default',
                    'id'=>'tag-box'
                ],
            ])?>
        </div>
    </div>


</div>
