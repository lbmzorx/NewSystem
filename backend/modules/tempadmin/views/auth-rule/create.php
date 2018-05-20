<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\admindata\AuthRule */

$this->title = Yii::t('app', 'Create {modelname}', [
    'modelname' => Yii::t('app', 'Auth Rules'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="auth-rule-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
