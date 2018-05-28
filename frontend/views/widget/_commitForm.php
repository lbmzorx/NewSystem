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

<?php $form = ActiveForm::begin(['action'=>\yii\helpers\Url::to(['article/commit'])]); ?>
<?= $form->field($model, 'article_id')->hiddenInput($options)->label(false) ?>
<?= $form->field($model, 'parent_id')->hiddenInput()->label(false) ?>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <?= $form->field($model, 'content',[
            'class'=>\lbmzorx\components\widget\EditorMdField::className(),
            'mdJsOptions'=>[
                'placeholder'=>'请输入内容',
                'width'=>'100%',
                'height'=>'300',
                'syncScrolling'=>"single",
                'watch'=> false,
                'toolbarIcons'=>[
                    "bold", "del", "italic", "quote","|",
                    "link", "image", "code", "preformatted-text", "code-block", "table", "datetime", "emoji", "html-entities", "|",
                        "undo", "redo", "|",  "hr", "info", "testIcon", "testIcon2", "file", "faicon", "||", "watch", "preview", "testIcon"
                ],
            ],
        ])->textarea()->label(\yii::t('app','Commit'));?>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="form-group">
                <?= \yii\helpers\Html::submitButton(Yii::t('app',Yii::t('app', 'Publish')), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
<?php $form = ActiveForm::end(); ?>