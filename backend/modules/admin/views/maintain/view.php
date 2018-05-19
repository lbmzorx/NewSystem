<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\admindata\Maintain */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Maintains'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintain-view">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
        </div>
        <div class="panel-body">
    <p>
        <?= Html::a('<i class="fa fa-pencil"></i> '.Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
               'attribute'=>'options_type',
               'value'=>$model->getStatusCode('options_type','options_type_code'),
            ],
            'show_type',
            'name',
            'value',
            'sign',
            'url:url',
            'info',
            'sort',
            'add_time:datetime',
            'edit_time:datetime',
            [
               'attribute'=>'status',
               'value'=>$model->getStatusCode('status','status_code'),
            ],
        ],
    ]) ?>
</div>
    </div>
</div>
