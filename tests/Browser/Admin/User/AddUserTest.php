<?php

namespace Tests\Browser\Admin\User;

use Tests\Browser\Admin\AdminDuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Users\AddUserPage;
use App\Models\User;

class AddUserTest extends AdminDuskTestCase
{
    // Define amount of users is created by set up function 
    public const NUMBER_USER_CREAT_BY_SET_UP = 2;
    // Define information for new admin user
    public const NEW_ADMIN_USER_USER_NAME = 'admin1';
    public const NEW_ADMIN_USER_EMAIl = 'admin1@gamil.com';
    public const NEW_ADMIN_USER_ADDRESS = 'DaNang';
    public const NEW_ADMIN_USER_PHONE = '0123466433';
    public const NEW_ADMIN_USER_ROLE = 'admin';
    public const NEW_ADMIN_USER_PASSWORD = '123123';
    // Define information for new normal user
    public const NEW_NORMAL_USER_USER_NAME = 'user1';
    public const NEW_NORMAL_USER_EMAIl = 'user1@gamil.com';
    public const NEW_NORMAL_USER_ADDRESS = 'DaNang';
    public const NEW_NORMAL_USER_PHONE = '0123466433';
    public const NEW_NORMAL_USER_ROLE = 'user';
    public const NEW_NORMAL_USER_PASSWORD = '123123';

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
     * Admin can create admin user
     *
     * @return void
     */
    public function test_admin_can_create_admin_user()
    {
        $this->browse(function (Browser $browser) {
            // Create new admin user
            $browser->loginAs($this->admin)
                    ->visit(new AddUserPage)
                    ->type('username', self::NEW_ADMIN_USER_USER_NAME)
                    ->type('email', self::NEW_ADMIN_USER_EMAIl)
                    ->type('address', self::NEW_ADMIN_USER_ADDRESS)
                    ->type('phone', self::NEW_ADMIN_USER_PHONE)
                    ->select('role', self::NEW_ADMIN_USER_ROLE)
                    ->type('password', self::NEW_ADMIN_USER_PASSWORD)
                    ->type('password_confirmation', self::NEW_ADMIN_USER_PASSWORD)
                    ->press('Create');
            $browser->assertPathIs('/admin/users')
                    ->assertSee(trans('admin/user.user_add.user_add_success'));
            // Check last user into list is new user
            $lastUser = User::latest('id')->first();
            $browser->assertSee($lastUser->username)
                    ->assertSee($lastUser->role);
            // Check new user is created into database
            $this->assertDatabaseHas('users', [
                'username' => self::NEW_ADMIN_USER_USER_NAME,
                'email' => self::NEW_ADMIN_USER_EMAIl,
                'address' => self::NEW_ADMIN_USER_ADDRESS,
                'phone' => self::NEW_ADMIN_USER_PHONE,
                'role' => self::NEW_ADMIN_USER_ROLE,
            ]);
            $this->assertDatabaseMissing('users', [
                'remember_token' => null,
            ]);
            // Logout and login by new admin user
            $browser->visit('/logout')->logout()
                    ->visit('/login')
                    ->type('email', self::NEW_ADMIN_USER_EMAIl)
                    ->type('password',self::NEW_ADMIN_USER_PASSWORD)
                    ->press('Login')
                    ->visit(new AddUserPage);
            // Log out Admin
            $browser->visit('/logout')->logout();
        });
    }

    /**
     * Admin can create normal user
     *
     * @return void
     */
    public function test_admin_can_create_normal_user()
    {
        $this->browse(function (Browser $browser) {
            // Create new admin user
            $browser->loginAs($this->admin)
                    ->visit(new AddUserPage)
                    ->type('username', self::NEW_NORMAL_USER_USER_NAME)
                    ->type('email', self::NEW_NORMAL_USER_EMAIl)
                    ->type('address', self::NEW_NORMAL_USER_ADDRESS)
                    ->type('phone', self::NEW_NORMAL_USER_PHONE)
                    ->select('role', self::NEW_NORMAL_USER_ROLE)
                    ->type('password', self::NEW_NORMAL_USER_PASSWORD)
                    ->type('password_confirmation', self::NEW_NORMAL_USER_PASSWORD)
                    ->press('Create');
            $browser->assertPathIs('/admin/users')
                    ->assertSee(trans('admin/user.user_add.user_add_success'));
            // Check last user into list is new user
            $lastUser = User::latest('id')->first();
            $browser->assertSee($lastUser->username)
                    ->assertSee($lastUser->role);
            // Check new user is created into database
            $this->assertDatabaseHas('users', [
                'username' => self::NEW_NORMAL_USER_USER_NAME,
                'email' => self::NEW_NORMAL_USER_EMAIl,
                'address' => self::NEW_NORMAL_USER_ADDRESS,
                'phone' => self::NEW_NORMAL_USER_PHONE,
                'role' => self::NEW_NORMAL_USER_ROLE,
            ]);
            $this->assertDatabaseMissing('users', [
                'remember_token' => null,
            ]);
            // Logout and login by new normal user
            $browser->visit('/logout')->logout()
                    ->visit('/login')
                    ->type('email', self::NEW_NORMAL_USER_EMAIl)
                    ->type('password', self::NEW_NORMAL_USER_PASSWORD)
                    ->press('Login')
                    ->visit('/admin/users/create');
            $browser->assertPathIsNot('/admin/users/create');
            // Log out Admin
            $browser->visit('/logout')->logout();
        });
    }

    /**
     * List case for test validate for input
     *
     * @return array
     */
    public function list_test_case_validate()
    {
        return [
            // Validation for username
            ['username', '', 'Username is empty'],
            ['username', str_random(256), 'Username length less than 255 words'],
            ['username', 'admin', 'Username is duplication'],
            // Validation for email
            ['email', '', 'Email is empty'],
            ['email', 'admin', 'Format Email is wrong!'],
            ['email', str_random(256), 'Email length less than 255 words'],
            ['email', 'admin@gmail.com', 'Email is duplication'],
            // Validation for Phone
            ['phone', '', 'Phone number is empty'],
            ['phone', '012ddssASA', 'Format phone is wrong!'],
            // Validation for address
            ['address', '', 'Address is not empty'],
            ['address', str_random(256), 'Address length less than 255 words'],
            // Validation for password
            ['password', '', 'Password is empty'],
            ['password', '123', 'Password length more than 6 words'],
        ];
    }

    /**
     * Fill to wrong validation value can't create new user
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message
     *
     * @dataProvider list_test_case_validate
     *
     * @return void
     */
    public function test_fill_to_wrong_validation_value_can_not_create_new_user($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            // Validation for create user
            // username ,email, phone, address, password
            $browser->loginAs($this->admin)
                    ->visit(new AddUserPage)
                    ->type($name, $content)
                    ->press('Create');
            $browser->assertPathIs('/admin/users/create')
                    ->assertSee($message);
            // Confimed Password is wrong
            $browser->loginAs($this->admin)
                    ->visit(new AddUserPage)
                    ->type('password', '123123')
                    ->type('password_confirmation', '123456')
                    ->press('Create');
            $browser->assertPathIs('/admin/users/create')
                    ->assertSee(__('admin/user.user_add.user_password_confirmed'));
            // Check new user can not create into database
            $lastUser = User::latest('id')->first();
            $this->assertEquals($lastUser->id, self::NUMBER_USER_CREAT_BY_SET_UP);
            // Log out Admin
            $browser->visit('/logout')->logout();
        });
    }
}
