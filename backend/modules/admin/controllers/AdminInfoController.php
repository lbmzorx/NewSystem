<?php

namespace backend\modules\admin\controllers;

use backend\models\ResetPasswordForm;
use common\models\admin\Admin;
use common\models\tool\UploadImg;
use lbmzorx\components\action\FormAction;
use lbmzorx\components\action\UploadAction;
use lbmzorx\components\helper\ModelHelper;
use Yii;
use backend\controllers\BaseCommon;
use common\models\admindata\AdminInfo;
use common\models\adminsearch\AdminInfo as SearchModel;
/**
 * AdminInfoController implements the CRUD actions for common\models\admindata\AdminInfo model.
 */
class AdminInfoController extends BaseCommon
{
    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();
        $this->modelNameIndexSearch =SearchModel::className();
        $this->modelNameView        =AdminInfo::className();
        $this->modelNameCreate      =AdminInfo::className();
        $this->modelNameUpdate      =AdminInfo::className();
        $this->modelNameDelete      =AdminInfo::className();
        $this->modelNameSort        =AdminInfo::className();
        $this->modelNameChangeStatus=AdminInfo::className();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return array_merge(parent::actions(),[
            'upload'=>[
                'class' => UploadAction::className(),
                'imgClass'=>UploadImg::className(),
                'imgAttribute'=>'imageFile',
                'imgConfig'=>[
                    'imgServerPath'=>'@backend/runtime/adminupload/',
                    'imgServer'=>'/adminupload/',
                    'nameIsUnit'=>true,
                    'nameModel'=>Admin::className(),
                    'nameAttributs'=>['admin'=>\yii::$app->user->id],
                ],
            ],
            'reset-password'=>[
                'class'=>FormAction::className(),
                'modelClass'=>ResetPasswordForm::className(),
                'verifyMethod'=>'resetPassword',
                'successMsg'=>\yii::t('app','Reset Password Success!'),
                'isErrorMsg'=>true,
//                'successRedirectvView'=>'/site/login',
            ],
        ]);
    }


    public function actionCard(){

        $request=\yii::$app->request;
        $info=AdminInfo::findOne(['admin_id'=>\yii::$app->user->id]);
        $admin=Admin::findOne(['id'=>\yii::$app->user->id]);
        if($request->isPost ){

            $t=\yii::$app->db->beginTransaction();
            if( !($admin->load($request->post()) && $admin->save())){
                $err=ModelHelper::getErrorAsString($admin,$admin->getErrors());
                $t->rollBack();
            }
            $info->admin_id=$admin->id;
            if( !($info->load($request->post()) && $info->save()) ){
                $err=ModelHelper::getErrorAsString($info,$info->getErrors());
                $t->rollBack();
            }
            if($request->isAjax){
                if(isset($err)){
                    return ['status'=>false,'msg'=>$err];
                }else{
                    $t->commit();
                    return ['status'=>true,'msg'=>\yii::t('app','Success')];
                }
            }else{
                if(isset($err)){
                    \yii::$app->getSession()->addFlash('error',$err);
                }else{
                    $t->commit();
                    \yii::$app->getSession()->setFlash('success',\yii::t('app','Success'));
                }
            }
        }
        return $this->render('card',['model'=>$info,'admin'=>$admin]);
    }
}
