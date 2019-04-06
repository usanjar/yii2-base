<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-30
 * Time: 23:51
 */

namespace app\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/admin/assets';

    public $css = [
        'css/font-awesome.min.css',
    ];

    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
    ];
}