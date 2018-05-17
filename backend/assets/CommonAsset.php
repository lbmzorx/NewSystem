<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CommonAsset extends AssetBundle
{
    public $sourcePath='@resource/admin/';
    public $css = [
        'css/main.css',
    ];
    public $js = [
        'js/klorofil-common.js',
//        'js/admin.js',
    ];
    public $depends = [
        'common\assets\JqueryAsset',
        'common\assets\BootstrapAsset',
        'common\assets\FontAwesomeAsset',
        'yii\web\YiiAsset',
        'common\assets\JquerySlimscroll',
        'common\assets\LineariconsAsset',
        'common\assets\JquerySlimscroll',
        'common\assets\ToastrAsset',
//        'common\assets\LayerAsset',
    ];
}
