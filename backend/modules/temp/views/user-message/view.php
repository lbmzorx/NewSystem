<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\startdata\UserMessage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-message-view">
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
            'send_id',
            'to_id',
            [
               'attribute'=>'read',
               'value'=>$model->getStatusCode('read','read_code'),
            ],
            [
               'attribute'=>'status',
               'value'=>$model->getStatusCode('status','status_code'),
            ],
            [
               'attribute'=>'priority',
               'value'=>$model->getStatusCode('priority','priority_code'),
            ],
            [
               'attribute'=>'send_type',
               'value'=>$model->getStatusCode('send_type','send_type_code'),
            ],
            [
               'attribute'=>'is_link',
               'value'=>$model->getStatusCode('is_link','is_link_code'),
            ],
            'content',
            'link',
            'add_time:datetime',
            [
               'attribute'=>'group_type',
               'value'=>$model->getStatusCode('group_type','group_type_code'),
            ],
            [
               'attribute'=>'message_type',
               'value'=>$model->getStatusCode('message_type','message_type_code'),
            ],
            'user_message_group_content_id',
        ],
    ]) ?>
</div>
    </div>
</div>
