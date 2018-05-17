<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
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
        'common\assets\LineariconsAsset',
        'common\assets\JsencryptAsset',
        'common\assets\ToastrAsset',
    ];
}
