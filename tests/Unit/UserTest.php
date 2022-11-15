<?php

namespace Tests\Unit;

use App\User_Test;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_name()
    {
        $user= new User_Test("Taha", "mohamed@gmail.com");
        $this->assertEquals("Taha", $user->name());
        $newName= "Samy";
        $this->assertSame($newName, $user->name($newName));
    }

    public function test_email()
    {
        $user= new User_Test("Taha", "mohamed@gmail.com");
        $this->assertEquals("mohamed@gmail.com", $user->email());
        $newMail= "Samy@gmail.com";
        $this->assertEquals($newMail, $user->email($newMail));
    }
}
