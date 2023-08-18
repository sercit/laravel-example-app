<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laracasts');
        });
    }

    public function testGuestDontSeeProfile(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/profile')
                ->screenshot('profile.guest')
                ->assertDontSee('Profile');
        });
    }
}
