<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/default';

    public $css = [
        'css/main.css',
    ];

    public $depends = [
        \yii\web\YiiAsset::class,
        \yii\bootstrap\BootstrapAsset::class,
    ];
}
