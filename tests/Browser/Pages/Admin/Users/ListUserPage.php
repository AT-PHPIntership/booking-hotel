<?php

namespace Tests\Browser\Pages\Admin\Users;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class ListUserPage extends BasePage
{
    // Users show on each page
    public const USERS_LIST_ON_EACH_PAGE = 5;

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/users';
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
                ->assertSee('Users List Table')
                ->assertSee('User Name')
                ->assertSee('Role')
                ->assertSee('Delete')
                ->assertSee('Edit')
                ->assertSee('Detail');
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
