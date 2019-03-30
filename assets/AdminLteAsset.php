<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-26
 * Time: 08:16
 */

namespace app\assets;

use yii\web\AssetBundle;

class AdminLteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/AdminLTE.min.css'
    ];

    public $depends = [
        \yii\web\YiiAsset::class,
        \yii\bootstrap\BootstrapAsset::class,
    ];
}