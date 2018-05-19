<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LayuiAsset extends AssetBundle
{
    public $sourcePath = '@resource/vendor/layui-v2.2.5/layui/';

    public $css=[
        'css/layui.css'
    ];
    public $js = [
        'layui.js'
    ];

    public $depends=[
        'jquery'=>'yii\web\JqueryAsset',
    ];
}
