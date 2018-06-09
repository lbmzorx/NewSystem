<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\startdata\UserMessage */

$this->title = Yii::t('app', 'Create {modelname}', [
    'modelname' => Yii::t('app', 'User Messages'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-message-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
