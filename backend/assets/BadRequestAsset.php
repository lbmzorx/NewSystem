<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class BadRequestAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin';

    public $css = [
        'css/main.css',
    ];
    public $js =[
        'js/admin.js',
    ];
    public $depends=[
        'yii\bootstrap\BootstrapAsset',
        'common\assets\FontAwesomeAsset',
        'common\assets\ToastrAsset',
    ];
}
