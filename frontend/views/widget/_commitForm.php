<?php
/**
 * Created by Administrator.
 * Date: 2018/5/27 23:30
 * github: https://github.com/lbmzorx
 */
use yii\widgets\ActiveForm;

/* @var $model \frontend\models\ArticleCommitForm */
/* @var $article_id */
$options=[];
if(isset($article_id)){
    $options=['value'=>$article_id];
}

?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'article_id')->hiddenInput($options)->label(false) ?>
<?= $form->field($model, 'parent_id')->hiddenInput()->label(false) ?>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <?= $form->field($model, 'content',[
            'class'=>\lbmzorx\components\widget\EditorMdField::className(),
            'mdJsOptions'=>[
                'placeholder'=>'请输入内容',
                'width'=>'100%',
                'height'=>'640',
                'syncScrolling'=>"single",
                'watch'=> false,
            ],
        ])->textarea()->label(\yii::t('app','Commit'));?>
    </div>
</div>
<?php $form = ActiveForm::end(); ?>