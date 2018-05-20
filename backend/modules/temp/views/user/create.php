<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\startdata\User */

$this->title = Yii::t('app', 'Create {modelname}', [
    'modelname' => Yii::t('app', 'Users'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
