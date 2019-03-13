<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-10
 * Time: 13:24
 */

namespace app\assets;


use yii\web\AssetBundle;

class IoniconAsset extends AssetBundle
{
    public $sourcePath = '@bower/ionicons/docs';

    public $css = [
        'css/ionicons.min.css'
    ];
}