<?php
/**
 * Created by Administrator.
 * Date: 2018/6/13 20:14
 * github: https://github.com/lbmzorx
 */

?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
    </div>
    <div class="panel-body">
        <div class="admin-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'status')->dropDownList(StatusCode::tranStatusCode(Admin::$status_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'head_img')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app',Yii::t('app', 'Save')), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>