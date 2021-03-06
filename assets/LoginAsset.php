<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-10
 * Time: 15:12
 */

namespace app\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class LoginAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/default';

    public $css = [
        'css/login.css',
    ];

    public $js = [
        'js/login.js',
    ];

    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        IoniconAsset::class,
        AdminLteAsset::class,
    ];
}