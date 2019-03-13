<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-10
 * Time: 14:52
 */

namespace app\assets;

use yii\web\AssetBundle;

class iCheckAsset extends AssetBundle
{
    public $sourcePath = '@bower/icheck';

    public $css = [
        'skins/flat/blue.css',
    ];

    public $js = [
        'icheck.min.js'
    ];
}