<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HeaderTest extends DuskTestCase
{
    private const PROFILE_ROUTE = '/profile';


    public function testUserClickMenuDropdown(): void
    {
        $this->browse(function (Browser $browser) {
            $user = $this->getUser();
            $browser->loginAs($user)
                ->visit(self::PROFILE_ROUTE)
                ->waitFor('a#navbarDropdown')
                ->click('a#navbarDropdown');

            $browser->assertVisible('.dropdown-menu.show');
        });
    }

    public function testUserTabDropdownMenu(): void
    {
        $this->browse(function (Browser $browser) {
            $user = $this->getUser();
            $browser->loginAs($user)
                ->visit(self::PROFILE_ROUTE)
                ->waitFor('a#navbarDropdown')
                ->click('a#navbarDropdown')
                ->waitFor('.dropdown-menu.show')
                ->clickLink('Logout');

            $browser->assertRouteIs('index');
        });
    }

    private function getUser(): User
    {
        return User::find(11);
    }
}
