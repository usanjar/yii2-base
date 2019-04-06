<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-30
 * Time: 23:57
 */

namespace app\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class SlimScrollAsset extends AssetBundle
{
    public $sourcePath = '@bower/slimscroll';

    public $js = [
        'jquery.slimscroll.min.js',
    ];

    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
    ];
}