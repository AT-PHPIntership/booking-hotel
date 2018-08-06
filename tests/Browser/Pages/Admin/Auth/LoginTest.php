<?php

namespace Tests\Browser\Pages\Admin\Auth;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;
use Tests\Browser\Pages\Admin\AdminDuskTestCase;

class LoginTest extends AdminDuskTestCase
{
    /**
     * Function setUp() to make user login.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Admin login with Success
     *
     * @return void
     */
    public function test_admin_login_with_fail_because_format_email_wrong()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin')
                    ->type('password','123123')
                    ->press('Login');
            $browser->assertPathIs('/login')
                    ->assertSee('The email must be a valid email address.');
        });
    }

    /**
     * Admin login with Success
     *
     * @return void
     */
    public function test_admin_login_with_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', $this->admin->email)
                    ->type('password','123123')
                    ->press('Login')
                    ->clickLink('Admin');
            $browser->assertPathIs('/admin/home');
        });
    }

    /**
     * Admin logout with success
     *
     * @return void
     */
    public function test_admin_logout_with_success()
    {       
        $this->browse(function (Browser $browser) {
            $browser->visit('/logout')->logout()
                    ->assertGuest();
        });
    }

    /**
     * User login with Success
     *
     * @return void
     */
    public function test_user_login_with_success()
    {       
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', $this->user->email)
                    ->type('password','123123')
                    ->press('Login')
                    ->clickLink('Admin');
            $browser->assertPathIs('/home');
        });
    }

    /**
     * User logout with success
     *
     * @return void
     */
    public function test_user_logout_with_success()
    {       
        $this->browse(function (Browser $browser) {
            $browser->visit('/logout')->logout()
                    ->assertGuest();
        });
    }

    /**
     * User login with fail because email wrong
     *
     * @return void
     */
    public function test_admin_login_with_fail_because_email_wrong()
    {       
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'thong@gmail.com')
                    ->type('password','123123')
                    ->press('Login');
            $browser->assertPathIs('/login')
                    ->assertSee('These credentials do not match our records');
        });
    }

    /**
     * User login with fail because password wrong
     *
     * @return void
     */
    public function test_admin_login_with_fail_because_password_wrong()
    {       
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', $this->user->email)
                    ->type('password','123456')
                    ->press('Login');
            $browser->assertPathIs('/login')
                    ->assertSee('These credentials do not match our records');
        });
    }

    /**
     * User login with fail because email and password wrong
     *
     * @return void
     */
    public function test_admin_login_with_fail_because_email_and_password_wrong()
    {       
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'thong@gmail.com')
                    ->type('password','123456')
                    ->press('Login');
            $browser->assertPathIs('/login')
                    ->assertSee('These credentials do not match our records');
        });
    }

    /**
     * If user dont' login then it goto admin/home with fail
     *
     * @return void
     */
    public function test_user_dont_login_then_goto_admin_with_fail()
    {       
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/home');
            $browser->assertPathIs('/');
        });
    }
}
