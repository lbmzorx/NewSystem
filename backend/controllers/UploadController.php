<?php

namespace backend\controllers;

use backend\components\actions\UploadAction;
use common\models\tool\UploadFile;
use common\models\tool\UploadImg;
use yii\base\Exception;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Default controller for the `upload` module
 */
class UploadController extends BaseCommon
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $pathImg='@frontend/web/';
        try{
            $url=\yii::$app->getRequest()->getUrl();
            $path=parse_url($url);
            if(isset($path['path']) && is_file( ($file=\Yii::getAlias($pathImg.$path['path'])))){
                $response=\yii::$app->getResponse();
                $img=pathinfo($path['path']);
                $response->getHeaders()->set('Content-Type','image/'.(isset($img['extension'])?$img['extension']:'png'));
                $response->format=Response::FORMAT_RAW;
                $response->content=file_get_contents($file);
                $response->send();
            }
        }catch (Exception $e){

        }
        throw new NotFoundHttpException();
    }

    public function actionAdminUpload(){


        $request=\yii::$app->request;
        $path=$request->get('path');
        $extension=$request->get('extension');
        if($path && in_array($extension,['png','jpg','jpeg'])){
            try{
                $file=\Yii::getAlias('@runtime/adminupload/'.$path.'.'.$extension);

                if( file_exists($file )){

                    $response=\yii::$app->getResponse();
                    $response->getHeaders()->set('Content-Type','image/'.($extension));
                    $response->format=Response::FORMAT_RAW;
                    $response->content=file_get_contents($file);
                    $response->send();
                    return $response;
                }
            }catch (Exception $e){

            }
        }
        throw new NotFoundHttpException();
    }

}
