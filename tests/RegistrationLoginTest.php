<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationLoginTest extends TestCase
{

    use DatabaseTransactions;

    public function testNewUserRegistration()
    {
        $response = $this->call('GET', 'registration');
        $this->assertEquals(404, $response->status());
    }

    public function testUserLogin()
    {
        $this->visit('/login')
            ->submitForm('Login', ['email' => 'admin@test.com', 'password' => 'aaaaaa'])
            ->see('Books Administration')
            ->seePageIs('/books');
    }
}
