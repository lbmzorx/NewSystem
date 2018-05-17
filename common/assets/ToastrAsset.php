<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ToastrAsset extends AssetBundle
{
    public $sourcePath = '@resource/vendor/toastr/';

    public $css=[
        'toastr.css'
    ];
    public $js = [
        'toastr.js'
    ];

    public $depends=[
        'common\assets\JqueryAsset',
    ];
}
