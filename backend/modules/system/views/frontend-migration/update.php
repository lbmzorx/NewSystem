<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\startdata\Migration */

$this->title = Yii::t('app', 'Update Migration: {nameAttribute}', [
    'nameAttribute' => $model->version,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Migrations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->version, 'url' => ['view', 'id' => $model->version]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="migration-update">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
