<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title =\yii::t('app','Activate Failed') ;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-5" style="margin: 0 auto;float:none">
    <div class="site-signup">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style=""><?= Html::encode($this->title) ?></h2>
                <p><?=\yii::t('app','Welcome to DoubleFloor Space')?></p>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                       <p>
                           <?=\yii::t('app','This url include some error!')?>
                       </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>