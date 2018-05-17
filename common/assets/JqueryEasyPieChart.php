<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class JqueryEasyPieChart extends AssetBundle
{
    public $sourcePath = '@resource/vendor/jquery.easy-pie-chart/';
    public $css=[
        'style.css',
    ];
    public $js=[
        'jquery.easypiechart.min.js',
    ];
}
