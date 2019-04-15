<?php

use app\models\User;
use Codeception\Test\Unit;
use app\tests\fixtures\UserFixture;

class UserTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return ['users' => UserFixture::class];
    }

    // tests
    public function testUserEntered(): void
    {
        /* @var $user User */
        $user = $this->tester->grabFixture('users', 'user1');

        expect($user->last_login_at)->notEquals(null);
    }

    public function testUserNotEntered(): void
    {
        /* @var $user User */
        $user = $this->tester->grabFixture('users', 'user2');

        sleep(15);

        expect($user->last_login_at)->equals(null);
    }
}