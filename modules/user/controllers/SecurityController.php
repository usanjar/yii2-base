<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-10
 * Time: 14:43
 */

namespace app\modules\user\controllers;

use dektrium\user\controllers\SecurityController as BaseSecurityController;

class SecurityController extends BaseSecurityController
{
    public $layout = '@app/themes/default/layouts/login.twig';
}