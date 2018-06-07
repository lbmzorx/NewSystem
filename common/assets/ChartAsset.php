<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ChartAsset extends AssetBundle
{
    public $sourcePath = null;

    public $js = [
        '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js'
    ];
}
