<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class JsencryptAsset extends AssetBundle
{
    public $sourcePath = '@resource/vendor/jsencrypt/';

    public $js = [
        'jsencrypt.min.js'
    ];

}
