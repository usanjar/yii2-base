<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-26
 * Time: 08:16
 */

namespace app\assets;

use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class AdminLteAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/admin/assets';

    public $css = [
        'css/AdminLTE.min.css',
        'css/skin-blue.min.css',
    ];

    public $js = [
        'js/adminlte.min.js'
    ];

    public $depends = [
        YiiAsset::class,
        BootstrapPluginAsset::class,
        FontAwesomeAsset::class,
        SlimScrollAsset::class,
    ];
}