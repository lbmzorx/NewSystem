<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\startsearch\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'article_content_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'article_cate_id') ?>

    <?= $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'cover') ?>

    <?php // echo $form->field($model, 'abstract') ?>

    <?php // echo $form->field($model, 'remain') ?>

    <?php // echo $form->field($model, 'auth') ?>

    <?php // echo $form->field($model, 'tag') ?>

    <?php // echo $form->field($model, 'commit') ?>

    <?php // echo $form->field($model, 'view') ?>

    <?php // echo $form->field($model, 'collection') ?>

    <?php // echo $form->field($model, 'thumbup') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'score') ?>

    <?php // echo $form->field($model, 'publish') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'page_type') ?>

    <?php // echo $form->field($model, 'add_time') ?>

    <?php // echo $form->field($model, 'edit_time') ?>

    <?php // echo $form->field($model, 'flag_headline') ?>

    <?php // echo $form->field($model, 'flag_recommend') ?>

    <?php // echo $form->field($model, 'flag_slide_show') ?>

    <?php // echo $form->field($model, 'flag_special_recommend') ?>

    <?php // echo $form->field($model, 'flag_roll') ?>

    <?php // echo $form->field($model, 'flag_bold') ?>

    <?php // echo $form->field($model, 'flag_picture') ?>

    <?php // echo $form->field($model, 'recycle') ?>

    <?php // echo $form->field($model, 'admin_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
