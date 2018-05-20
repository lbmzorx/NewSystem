<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\startdata\ArticleCate */

$this->title = Yii::t('app', 'Update {modelname}: {nameAttribute}', [
    'modelname' => Yii::t('app', 'Article Cates'),
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Cates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="article-cate-update">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
