<?php

namespace Tests\Browser\Pages\Admin\Users;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class EditUserPage extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/users/2/edit';
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
                ->assertSee('Users Edit Table')
                ->assertSee('User Name')
                ->assertSee('Email')
                ->assertSee('Phone')
                ->assertSee('Address')
                ->assertSee('Role')
                ->assertSee('New Password')
                ->assertSee('New Password Confirm')
                ->assertSee('Edit')
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
