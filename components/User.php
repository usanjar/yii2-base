<?php
/**
 * @link https://ibank.nbu.uz/
 * @copyright Copyright (c) 2018 O'ZMILLIYBANK
 */

namespace app\components;

use yii\web\IdentityInterface;

/**
 * @inheritdoc
 *
 * @property \dektrium\user\models\User|IdentityInterface|null $identity The identity object associated with the currently logged-in user. null is returned if the user is not logged in (not authenticated).
 */
class User extends \yii\web\User
{
}