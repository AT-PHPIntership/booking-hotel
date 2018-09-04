<?php

namespace Tests\Browser\Admin\User;

use Tests\Browser\Admin\AdminDuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Users\ListUserPage;

class DeleteUserTest extends AdminDuskTestCase
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
     * Delete user with fail
     *
     * @return void
     */
    public function test_delete_user_with_fail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                    ->visit(new ListUserPage);
            $browser->click("@delete-".$this->user->id)
                    ->assertDialogOpened( __('admin/user.user_list.user_confirm')." ".$this->user->username)
                    ->dismissDialog();
            $this->assertDatabaseHas('users', [
                'id' => 2,
                'username' => $this->user->username,
            ]);
        });
    }

    /**
     * Delete user with success
     *
     * @return void
     */
    public function test_delete_user_with_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                    ->visit(new ListUserPage);
            $browser->click("@delete-".$this->user->id)
                    ->assertDialogOpened( __('admin/user.user_list.user_confirm')." ".$this->user->username)
                    ->acceptDialog()
                    ->assertSee( __('admin/user.user_delete.user_delete_success'));
            $this->assertDatabaseMissing('users', [
                'id' => 2,
                'username' => null,
            ]);
        });
    }
}
