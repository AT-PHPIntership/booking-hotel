<?php

namespace Tests\Browser\Admin\User;

use Tests\Browser\Admin\AdminDuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Users\EditUserPage;
use App\Models\User;

class EditUserTest extends AdminDuskTestCase
{

    // Define amount of users is created by set up function 
    public const NUMBER_USER_CREAT_BY_SET_UP = 2;

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
     * Edit normal user with success
     *
     * @return void
     */
    public function test_edit_user_with_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                    ->visit(new EditUserPage)
                    ->type('username', 'admin1')
                    ->type('email', 'admin1@gamil.com')
                    ->type('address', 'Ho Chi Minh')
                    ->type('phone', '0123444433')
                    ->select('role', 'admin')
                    ->type('password', '123123')
                    ->type('password_confirmation', '123123')
                    ->press('Update');
            $browser->assertPathIs('/admin/users')
                    ->assertSee(trans('admin/user.user_edit.user_edit_success'));
            // Check User is edited
            $lastUser = User::latest('id')->first();
            $this->assertEquals($lastUser->id, self::NUMBER_USER_CREAT_BY_SET_UP);
            $this->assertEquals($lastUser->username, "admin1");
            $this->assertEquals($lastUser->email, 'admin1@gamil.com');
            $this->assertEquals($lastUser->address, 'Ho Chi Minh');
            $this->assertEquals($lastUser->phone, '0123444433');
            $this->assertEquals($lastUser->role, 'admin');
            // Check user is edited into database
            $this->assertDatabaseHas('users', [
                'username' => 'admin1',
                'email' => 'admin1@gamil.com',
                'address' => 'Ho Chi Minh',
                'phone' => '0123444433',
                'role' => 'admin',
            ]);
            // Logout and login by edited user
            $browser->visit('/logout')->logout()
                    ->visit('/login')
                    ->type('email', 'admin1@gamil.com')
                    ->type('password','123123')
                    ->press('Login')
                    ->clickLink('Admin');
            $browser->visit(new EditUserPage);
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
            ['password', '', 'Password is a string'],
            ['password', '123', 'Password length more than 6 words'],
        ];
    }

    /**
     * Fill to wrong validation value can't edit user
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message
     *
     * @dataProvider list_test_case_validate
     *
     * @return void
     */
    public function test_fill_to_wrong_validation_value_can_not_edit_user($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            // Before information user is edited
            $beforeUpdateUser = User::find(self::NUMBER_USER_CREAT_BY_SET_UP);
            // Validation for create user
            // username ,email, phone, address, password
            $browser->loginAs($this->admin)
                    ->visit(new EditUserPage)
                    ->type($name, $content)
                    ->press('Update');
            $browser->assertPathIs('/admin/users/2/edit')
                    ->assertSee($message);
            // Confimed Password is wrong
            $browser->loginAs($this->admin)
                    ->visit(new EditUserPage)
                    ->type('password', '123123')
                    ->type('password_confirmation', '123456')
                    ->press('Update');
            $browser->assertPathIs('/admin/users/2/edit')
                    ->assertSee(__('admin/user.user_edit.user_password_confirmed'));
            // After information user is edited
            $afterUpdateUser = User::find(self::NUMBER_USER_CREAT_BY_SET_UP);
            $this->assertEquals($beforeUpdateUser, $afterUpdateUser);
            // Log out Admin
            $browser->visit('/logout')->logout();
        });
    }
}
