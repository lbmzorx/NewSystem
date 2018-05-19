<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\admindata\AdminMessageLog */

$this->title = Yii::t('app', 'Update Admin Message Log: {nameAttribute}', [
    'nameAttribute' => $model->admin_message_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Message Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->admin_message_id, 'url' => ['view', 'admin_message_id' => $model->admin_message_id, 'admin_id' => $model->admin_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="admin-message-log-update">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
