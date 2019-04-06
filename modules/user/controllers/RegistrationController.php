<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-13
 * Time: 23:01
 */

namespace app\modules\user\controllers;

use dektrium\user\controllers\RegistrationController as BaseRegistrationController;

class RegistrationController extends BaseRegistrationController
{
    public $layout = '@app/themes/default/layouts/login.twig';
}