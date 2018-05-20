<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\startdata\ArticleCommit */

$this->title = Yii::t('app', 'Update Article Commit: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Commits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="article-commit-update">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
