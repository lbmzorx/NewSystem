<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\user\LoginForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = \yii::t('app','Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-5"  style="margin: 0 auto;float:none">
    <div class="site-login">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style=""><?= Html::encode($this->title) ?></h2>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username',[
                    'class'=>\lbmzorx\components\widget\InputAddField::className(),
                    'firstContent'=>$model->getAttributeLabel('username'),
                    'firstOption'=>['id'=>'icon-show'],
                ])->textInput(['autofocus' => true])->label(false)?>
                <?= $form->field($model, 'password',[
                    'class'=>\lbmzorx\components\widget\InputAddField::className(),
                    'firstContent'=>$model->getAttributeLabel('password'),
                    'firstOption'=>['id'=>'icon-show'],
                ])->passwordInput()->label(false)?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton(\yii::t('app','Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <div style="color:#999;margin:1em 0">
                    <span><?= Html::a(\yii::t('app','Forgot password'), ['site/request-password-reset'])?></span>
                    <span class="pull-right"><?= Html::a(\yii::t('app','Signup'), ['site/signup'])?></span>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php $pubkey=\lbmzorx\components\helper\Rsaenctype::getPubKey(true)?>
<?php $passwordId=Html::getInputId($model,'password')?>

<?=$this->registerJs(<<<SCRYPT
var encrypt = new JSEncrypt();encrypt.setPublicKey('{$pubkey}');    
function do_encrypt(str) { return encrypt.encrypt(str);}
var count=1;
$('#login-form').submit(function(){
    if(count==1){
         $('#{$passwordId}').val(do_encrypt($('#{$passwordId}').val().trim()));
    }
    count++;
});
SCRYPT
)?>