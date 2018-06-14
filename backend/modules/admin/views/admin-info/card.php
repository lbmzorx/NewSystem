<?php
/**
 * Created by Administrator.
 * Date: 2018/6/14 20:50
 * github: https://github.com/lbmzorx
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use lbmzorx\components\behavior\StatusCode;
?>
<div class="panel">
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-lg-3 col-sm-3">
            <div class="panel">
                <div class="panel-body">
                    <div class="text-center">
                        <?= $form->field($admin, 'head_img',[
                            'class'=>\lbmzorx\components\widget\UploadImgField::className(),
                            'jsOptions'=>[
                                'urlUpload'=>\yii\helpers\Url::to(['upload']),
                                'field'=>'UploadImg[imageFile]',
                            ],
                        ])->fileInput([]);?>
                        <h3><?=$admin->username?></h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-sm-9">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'real_name')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'sex')->dropDownList(StatusCode::tranStatusCode(\common\models\admindata\AdminInfo::$sex_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'county')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'identified_card')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'qq')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'wechat')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'weibo')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3">
                            <?= $form->field($model, 'other_mongodb')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('app',Yii::t('app', 'Save')), ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>