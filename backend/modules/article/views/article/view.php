<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\startdata\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">
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
            'article_content_id',
            'user_id',
            'article_cate_id',
            'sort',
            'title',
            'author',
            'cover',
            'abstract',
            [
               'attribute'=>'remain',
               'value'=>$model->getStatusCode('remain','remain_code'),
            ],
            [
               'attribute'=>'auth',
               'value'=>$model->getStatusCode('auth','auth_code'),
            ],
            'tag',
            'commit',
            'view',
            'collection',
            'thumbup',
            [
               'attribute'=>'level',
               'value'=>$model->getStatusCode('level','level_code'),
            ],
            'score',
            [
               'attribute'=>'publish',
               'value'=>$model->getStatusCode('publish','publish_code'),
            ],
            [
               'attribute'=>'status',
               'value'=>$model->getStatusCode('status','status_code'),
            ],
            [
               'attribute'=>'page_type',
               'value'=>$model->getStatusCode('page_type','page_type_code'),
            ],
            'add_time:datetime',
            'edit_time:datetime',
            [
               'attribute'=>'flag_headline',
               'value'=>$model->getStatusCode('flag_headline','flag_headline_code'),
            ],
            [
               'attribute'=>'flag_recommend',
               'value'=>$model->getStatusCode('flag_recommend','flag_recommend_code'),
            ],
            [
               'attribute'=>'flag_slide_show',
               'value'=>$model->getStatusCode('flag_slide_show','flag_slide_show_code'),
            ],
            [
               'attribute'=>'flag_special_recommend',
               'value'=>$model->getStatusCode('flag_special_recommend','flag_special_recommend_code'),
            ],
            [
               'attribute'=>'flag_roll',
               'value'=>$model->getStatusCode('flag_roll','flag_roll_code'),
            ],
            [
               'attribute'=>'flag_bold',
               'value'=>$model->getStatusCode('flag_bold','flag_bold_code'),
            ],
            [
               'attribute'=>'flag_picture',
               'value'=>$model->getStatusCode('flag_picture','flag_picture_code'),
            ],
            [
               'attribute'=>'recycle',
               'value'=>$model->getStatusCode('recycle','recycle_code'),
            ],
            'admin_id',
        ],
    ]) ?>
</div>
    </div>
</div>
