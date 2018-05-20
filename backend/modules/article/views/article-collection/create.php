<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\startdata\ArticleCollection */

$this->title = Yii::t('app', 'Create Article Collection');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Collections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-collection-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
