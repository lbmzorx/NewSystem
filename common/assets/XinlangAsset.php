<?php

namespace common\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class XinlangAsset extends AssetBundle
{
    public $sourcePath =null;

    public $js = [
        'http://tjs.sjs.sinajs.cn/open/api/js/wb.js'
    ];

    public $jsOptions=[
        'position'=>View::POS_HEAD,
        'charset'=>'utf-8',
    ];
}
