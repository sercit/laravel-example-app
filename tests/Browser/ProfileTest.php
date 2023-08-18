<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProfileTest extends DuskTestCase
{
    private const PROFILE_ROUTE = '/profile';

    /**
     * A basic browser test example.
     */
    public function testGuestProfile(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(self::PROFILE_ROUTE)
                ->assertPathIsNot(self::PROFILE_ROUTE);
        });
    }

    public function testUserProfile(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->getUser())
                ->visit(self::PROFILE_ROUTE)
                ->assertPathIs(self::PROFILE_ROUTE);
        });
    }

    public function testUserProfileContent(): void
    {
        $this->browse(function (Browser $browser) {
            $user = $this->getUser();
            $text = $browser->loginAs($user)
                ->visit(self::PROFILE_ROUTE)
                ->text('a#navbarDropdown');
            $this->assertEquals($text, $user->name);
        });
    }




    private function getUser(): User
    {
        return User::find(11);
    }
}
