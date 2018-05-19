<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\admindata\AdminMessage */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-message-view">
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
            'to_admin_id',
            'from_admin_id',
            [
               'attribute'=>'spread_type',
               'value'=>$model->getStatusCode('spread_type','spread_type_code'),
            ],
            [
               'attribute'=>'level',
               'value'=>$model->getStatusCode('level','level_code'),
            ],
            'name',
            'content',
            [
               'attribute'=>'read',
               'value'=>$model->getStatusCode('read','read_code'),
            ],
            [
               'attribute'=>'from_type',
               'value'=>$model->getStatusCode('from_type','from_type_code'),
            ],
            'add_time:datetime',
        ],
    ]) ?>
</div>
    </div>
</div>
