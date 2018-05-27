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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'remain',
            'auth',
            'tag',
            'commit',
            'view',
            'collection',
            'thumbup',
            'level',
            'score',
            'publish',
            'status',
            'page_type',
            'add_time:datetime',
            'edit_time:datetime',
            'flag_headline',
            'flag_recommend',
            'flag_slide_show',
            'flag_special_recommend',
            'flag_roll',
            'flag_bold',
            'flag_picture',
            'recycle',
            'admin_id',
        ],
    ]) ?>

</div>
