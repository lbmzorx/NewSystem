<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ChartAsset extends AssetBundle
{
    public $sourcePath = '@resource/vendor/chartist';
    public $css=[
        'css/chartist-custom.css',
    ];
    public $js = [
        'js/chartist.min.js'
    ];
}
