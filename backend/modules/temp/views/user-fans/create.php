<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\startdata\UserFans */

$this->title = Yii::t('app', 'Create {modelname}', [
    'modelname' => Yii::t('app', 'User Fans'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Fans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-fans-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
