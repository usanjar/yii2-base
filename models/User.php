<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class User
 * @package app\models
 * @property string $id [integer]
 * @property string $username [varchar(25)]
 * @property string $email [varchar(255)]
 * @property string $password_hash [varchar(60)]
 * @property string $auth_key [varchar(32)]
 * @property string $confirmed_at [integer]
 * @property string $unconfirmed_email [varchar(255)]
 * @property string $blocked_at [integer]
 * @property string $registration_ip [varchar(45)]
 * @property string $created_at [integer]
 * @property string $updated_at [integer]
 * @property string $flags [integer]
 * @property string $last_login_at [integer]
 */
class User extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%user}}';
    }
}
