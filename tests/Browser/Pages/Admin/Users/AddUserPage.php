<?php

namespace Tests\Browser\Pages\Admin\Users;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class AddUserPage extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/users/create';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
                ->assertSee('Users Add Table')
                ->assertSee('User Name')
                ->assertSee('Email')
                ->assertSee('Phone')
                ->assertSee('Address')
                ->assertSee('Role')
                ->assertSee('Password')
                ->assertSee('Password Confirm')
                ->assertSee('Create')
                ->assertSee('Reset');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
