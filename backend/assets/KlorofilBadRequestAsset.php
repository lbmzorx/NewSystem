<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class KlorofilBadRequestAsset extends AssetBundle
{
    public $sourcePath='@resource/tid_5_klorofil/assets';

    public $css = [
        'css/main.css',
    ];
    public $js =[
    ];
    public $depends=[
        'jquery'=>'yii\web\JqueryAsset',
        'boostrap'=>'yii\bootstrap\BootstrapAsset',
        'fontawesome' =>'common\assets\FontAwesomeAsset',
        'toastr'=>'lbmzorx\components\assets\ToastrAsset',
        'lbmzorx'=>'lbmzorx\components\assets\LbmzorxAsset',
    ];
}
