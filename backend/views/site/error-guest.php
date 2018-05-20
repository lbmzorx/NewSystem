<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/23
 * Time: 0:56
 */
/* @var $name string */
/* @var $message string */
$this->title = $name;
if(empty($this->title)){
    if($warning=\yii::$app->getSession()->getFlash('warning')){
        $message = $warning;
        $this->title=\yii::t('app','Warning');
    }else if($error=\yii::$app->getSession()->getFlash('error')){
        $message = $error;
        $this->title=\yii::t('app','Error');
    }
}
?>
<?=$this->beginBody()?>
<div class="container">
    <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
            <div class="col-middle">
                <div class="text-center text-center">
                    <h1 class="error-number"><i class="fa fa-warning text-danger"></i><?= \yii\helpers\Html::encode($this->title) ?></h1>
                    <h2></h2>
                    <p><?= nl2br(\yii\helpers\Html::encode($message))?></p>
                    <a class="btn btn-primary" href="<?=\yii::$app->request->referrer?>"><?=\yii::t('error','Return')?></a>
                    <a class="btn btn-primary" href="<?=\yii\helpers\Url::to(['site/login'])?>"><?=\yii::t('error','Login')?>登录</a>
                </div>

            </div>
        </div>
        <!-- /page content -->
    </div>
</div>