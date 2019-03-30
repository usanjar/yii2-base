<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-26
 * Time: 08:13
 */

namespace app\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/admin/assets';

    public $css = [
        'css/admin.css'
    ];

    public $depends = [
        AdminLteAsset::class,
    ];
}