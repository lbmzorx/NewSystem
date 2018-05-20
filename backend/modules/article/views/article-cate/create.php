<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\startdata\ArticleCate */

$this->title = Yii::t('app', 'Create Article Cate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Cates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-cate-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
