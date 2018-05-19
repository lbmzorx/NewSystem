<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\admindata\Maintain */

$this->title = Yii::t('app', 'Create Maintain');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Maintains'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="maintain-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
