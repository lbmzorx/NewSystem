<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\startdata\Attention */

$this->title = Yii::t('app', 'Create {modelname}', [
    'modelname' => Yii::t('app', 'Attentions'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attentions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="attention-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
