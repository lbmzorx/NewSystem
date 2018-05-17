<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class Progressbas extends AssetBundle
{
    public $sourcePath='@resource/admin/';
    public $css = [
        'js/progress-bar/number-pb.css',
    ];
    public $js = [
        "js/progress-bar/src/jquery.velocity.min.js",
        "js/progress-bar/number-pb.js",
        "js/progress-bar/progress-app.js",
    ];
}
