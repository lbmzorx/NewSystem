<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\startdata\ArticleCommit */

$this->title = Yii::t('app', 'Create {modelname}', [
    'modelname' => Yii::t('app', 'Article Commits'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Commits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-commit-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
