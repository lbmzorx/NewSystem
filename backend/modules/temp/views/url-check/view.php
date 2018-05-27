<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\startdata\UrlCheck */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Url Checks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-check-view">
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
            'md5',
            'url:url',
            'user_id',
            'ip',
            'num',
            [
               'attribute'=>'status',
               'value'=>$model->getStatusCode('status','status_code'),
            ],
            'auth_key',
            'expire_time:datetime',
            'add_time:datetime',
        ],
    ]) ?>
</div>
    </div>
</div>
