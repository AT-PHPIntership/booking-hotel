<?php

namespace Tests\Browser\Admin\User;

use Tests\Browser\Admin\AdminDuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Users\ListUserPage;
use App\Models\User;

class ListUserTest extends AdminDuskTestCase
{

    use DatabaseMigrations;
    // Define amount of users is created by factory 
    public const NUMBER_USER_CREAT_BY_FACTORY = 20;
    // Define amount of users is created by set up function 
    public const NUMBER_USER_CREAT_BY_SET_UP = 2;
    protected $middUser;

    /**
     * Function setUp() to make user login.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory(User::class, self::NUMBER_USER_CREAT_BY_FACTORY)->create();
    }

    /**
     * Test show list user from database
     *
     * @return void
     */
    public function test_show_list_user_from_database()
    {
        $firstUser = User::first();
        $middUser = User::latest('id')->where('id','7')->first();
        $lastUser = User::latest('id')->first();
        $this->browse(function (Browser $browser) use ($firstUser, $middUser, $lastUser) {
            // Login as admin for test Page elements
            // Each page list 5 Users 
            $browser->loginAs($this->admin)
                    ->visit(new ListUserPage)
                    ->assertQueryStringMissing('page')
                    ->assertSee($firstUser->username)
                    ->assertSee($firstUser->role);
            $browser->press('Delete');
            $rows = $browser->elements('table tbody tr');
            $actualCount = count($rows);
            $expectedCount = ListUserPage::USERS_LIST_ON_EACH_PAGE;
            $this->assertEquals($expectedCount, $actualCount);
            // Page 2 lists 5 coutinue Users
            $browser->clickLink('2')
                    ->assertQueryStringHas('page', '2')
                    ->assertSee($middUser->username)
                    ->assertSee($middUser->role);
            $rows = $browser->elements('table tbody tr');
            $actualCount = count($rows);
            $expectedCount = ListUserPage::USERS_LIST_ON_EACH_PAGE;
            $this->assertEquals($expectedCount, $actualCount);
            // Because database has 22 users and each page lists 5 users,so the Last Page has 2 Users
            $browser->clickLink('5')
                    ->assertQueryStringHas('page', '5')
                    ->assertSee($lastUser->username)
                    ->assertSee($lastUser->role);
            $rows = $browser->elements('table tbody tr');
            $actualCount = count($rows);
            $expectedCount = (self::NUMBER_USER_CREAT_BY_FACTORY + self::NUMBER_USER_CREAT_BY_SET_UP) % ListUserPage::USERS_LIST_ON_EACH_PAGE;
            $this->assertEquals($expectedCount, $actualCount);
            // Test Delete User can see message
            $browser->click('.table-bordered > tbody > tr > form > Delete')
                    ->assertDialogOpened("Are you sure?");
            // $browser->acceptDialog();
                    // ->assertSee('Are you delete');
        });
    }
}
