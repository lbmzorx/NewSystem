<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class BootstrapAsset extends AssetBundle
{
    public $sourcePath = '@resource/vendor/bootstrap/';
    public $css = [
        'css/bootstrap.min.css',
        'css/bootstrap-theme.min.css',
    ];
    public $js=[
        'js/bootstrap.min.js',
    ];
}
