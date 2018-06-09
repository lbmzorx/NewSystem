<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\startdata\UserFans */

$this->title = Yii::t('app', 'Update {modelname}: {nameAttribute}', [
    'modelname' => Yii::t('app', 'User Fans'),
    'nameAttribute' => $model->attention_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Fans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->attention_id, 'url' => ['view', 'attention_id' => $model->attention_id, 'fans_id' => $model->fans_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-fans-update">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
