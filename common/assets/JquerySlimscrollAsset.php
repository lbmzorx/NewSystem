<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class JquerySlimscrollAsset extends AssetBundle
{
    public $sourcePath = '@resource/vendor/jquery-slimscroll/';

    public $js = [
        'jquery.slimscroll.min.js'
    ];

}
