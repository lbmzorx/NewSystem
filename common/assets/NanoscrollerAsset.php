<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class NanoscrollerAsset extends AssetBundle
{
    public $sourcePath = '@resource/vendor/nanoscroller/';

    public $css=[
        'nanoscroller.css'
    ];
    public $js = [
        'jquery.nanoscroller.min.js'
    ];

    public $depends=[
        'common\assets\JqueryAsset',
    ];
}
