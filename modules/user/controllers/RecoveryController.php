<?php
/**
 * Created by PhpStorm.
 * User: sanjar
 * Date: 2019-03-13
 * Time: 23:06
 */

namespace app\modules\user\controllers;

use dektrium\user\controllers\RecoveryController as BaseRecoveryController;

class RecoveryController extends BaseRecoveryController
{
    public $layout = '@app/themes/default/layouts/login.twig';
}