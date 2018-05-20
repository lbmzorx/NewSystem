<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\admindata\AdminLog */

$this->title = Yii::t('app', 'Create {modelname}', [
    'modelname' => Yii::t('app', 'Admin Logs'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-log-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
