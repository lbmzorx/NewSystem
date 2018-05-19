<?php
/**
 * Created by Administrator.
 * Date: 2018/5/18 0:33
 * github: https://github.com/lbmzorx
 */

namespace backend\assets;


use yii\web\AssetBundle;
class KlorofilAsset extends AssetBundle
{
    public $sourcePath='@resource/tid_5_klorofil/assets';

    public $css=[
        'css/main.css'
    ];

    public $js=[
        'scripts/klorofil-common.js'
    ];

    public $depends=[
        'boostrap'=>'yii\bootstrap\BootstrapAsset',
        'boostrapPlugs'=>'yii\bootstrap\BootstrapPluginAsset',
        'linearicons'=>'common\assets\LineariconsAsset',

    ];

    public $publishOptions=[
        'only'=>[
            'css/*','scripts/*'
        ],
    ];
}