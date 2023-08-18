<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Login;
use Tests\DuskTestCase;

/**
 * @group login
 */
class LoginTest extends DuskTestCase
{
    private const LOGIN_ROUTE = '/login';
    private const HOME_ROUTE = '/home';

//    public function testUserLogin(): void
//    {
//        $this->browse(function (Browser $browser) {
//            $user = $this->getUser();
//            $browser->visit(self::LOGIN_ROUTE)
//                ->keys('form input[type="email"]', $user->email)
//                ->keys('form input[type="password"]', 'password')
//                ->press('Login')
//                ->assertPathIs(self::HOME_ROUTE);
//        });
//    }
    public function testUserLoginWith(): void
    {
        $this->browse(function (Browser $browser) {
            $user = $this->getUser();
            $browser->visit(new Login())
                ->keys('@email', $user->email)
                ->keys('@password', 'password')
                ->press('@submit')
                ->assertPathIs(self::HOME_ROUTE);
        });
    }

    private function getUser(): User
    {
        return User::find(11);
    }
}
