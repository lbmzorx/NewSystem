<?php
/**
 * Created by aa.
 * User: aa
 * Date: 2018/6/12 8:36
 * Email: @foxdou.com
 */

namespace common\components\helper;


use yii\helpers\FileHelper;

class RuntimeHelper
{
    public static function getFileList($path,$filename='',$maxrow=1000){
        $contentRows=[];
        $filenames=[];
        $fileinfo=[];
        if(is_dir($path)){
            $filelist=FileHelper::findFiles($path,['except'=>['*.pid']]);
            if($filelist){
                foreach ($filelist as $k=>$v){
                    $filenames[$k]=str_replace($path,'',$v);
                    if(preg_match('/\//',$filenames[$k])){
                        $delemer='/';
                    }else{
                        $delemer='\\';
                    }
                    $filenames[$k]=ltrim($filenames[$k],$delemer);
                    $fileinfo[$filenames[$k]]=['size'=>static::setUnit(filesize($v))];
                }
                if(!$filename){
                    $filename=$filenames[0];
                }
                if(in_array($filename,$filenames)){
                    $key=array_flip($filenames);
                    $file=$filelist[$key[$filename]];
                    if(file_exists($file) && is_readable($file)) {
                        $contentRows=static::getFileLastRow($file,$maxrow);
                    }
                }
            }
        }
        return ['filename'=>$filename,'content'=>$contentRows,'filelist'=>$fileinfo];
    }

    /**
     * 发送文件，如果大于1MB 则只下前1000条记录
     * @param $path
     * @param string $filename
     * @return bool|\yii\console\Response|\yii\web\Response
     */
    public static function loadFile($path,$filename=''){
        $file = $path.'/'.$filename;
        if(is_dir($path)){
            if(file_exists($file) && is_readable($file)) {
                if(filesize($file)<10*1024*1024){
                    \yii::$app->response->sendFile($file);
                    return \yii::$app->response;
                }else{
                    $n=1000;
                    $appStr=static::getFileLastRow($file,$n);
                    \yii::$app->response->sendContentAsFile(implode("\n",$appStr),$filename);
                    return \yii::$app->response;
                }
            }
        }
        return false;
    }

    public static function setUnit($size){
        $unitlevel=['KB'=>1,'MB'=>2,'GB'=>3,'TB'=>4,'PB'=>5];
        $len=strlen((string)$size);
        if($len>=12) {
            $sub=4;
        }elseif($len>=9){
            $sub=3;
        }elseif($len>=6){
            $sub=2;
        }elseif($len>=3){
            $sub=1;
        }else{
            $sub=0;
        }

        $subTotal=1;
        for($i=0;$i<$sub;$i++){
            $subTotal=$subTotal*1024;
        }
        $value=round($size/$subTotal,3);
        $flip=array_flip($unitlevel);
        $unit=isset($flip[$sub])?$flip[$sub]:'B';
        return $value.$unit;
    }

    public static function getFileLastRow($filename,$n){
        if(!$fp=fopen($filename,'r')){
            return false;
        }
        $pos=-2;
        $eof="";
        $str=[];
        while($n>0){
            while($eof!="\n"){
                if(!fseek($fp,$pos,SEEK_END)){
                    $eof=fgetc($fp);
                    $pos--;
                }else{
                    break;
                }
            }
            $str[]=fgets($fp);
            $eof="";
            $n--;
        }
        return $str;
    }

}