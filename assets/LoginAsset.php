<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-10
 * Time: 15:12
 */

namespace app\assets;

use yii\web\AssetBundle;

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
        \yii\web\YiiAsset::class,
        \yii\bootstrap\BootstrapAsset::class,
        IoniconAsset::class,
        AdminLteAsset::class,
    ];
}