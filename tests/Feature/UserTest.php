<?php

namespace App\Models;
use PHPUnit\Framework\TestCase;


class UserTest extends TestCase
{
    public function testFillableAttributes()
    {
        $user = new User();
        $this->assertEquals(['name', 'email', 'password'], $user->getFillable());
    }

    public function testHiddenAttributes()
    {
        $user = new User();
        $this->assertEquals(['password', 'remember_token'], $user->getHidden());
    }


}
