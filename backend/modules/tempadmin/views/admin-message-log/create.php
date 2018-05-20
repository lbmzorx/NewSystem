<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\admindata\AdminMessageLog */

$this->title = Yii::t('app', 'Create {modelname}', [
    'modelname' => Yii::t('app', 'Admin Message Logs'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Message Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-message-log-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
