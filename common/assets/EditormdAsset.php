<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class EditormdAsset extends AssetBundle
{
    public $sourcePath = '@resource/vendor/editor.md-master/';

    public $css=[
        'css/editormd.css',
    ];

    public $js = [
        'editormd.min.js',
    ];

    public $depends=[
        'jquery'=>'yii\web\JqueryAsset',
    ];
}
