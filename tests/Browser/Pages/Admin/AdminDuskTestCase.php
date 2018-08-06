<?php

namespace Tests\Browser\Pages\Admin;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

abstract class AdminDuskTestCase extends DuskTestCase
{
    use DatabaseMigrations;

    protected $admin, $admin_wrong, $user;

    /**
     * Set up admin and user to test admin page.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        // Create admin
        $this->admin = factory('App\Models\User')->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123'),
            'role' => User::ADMIN_USER,
            'remember_token' => str_random(10),
            'address' => 'Da Nang',
            'phone' => '01223499433',
        ]);
        // Create user
        $this->user = factory('App\Models\User')->create([
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123123'),
            'role' => User::NORMAL_USER,
            'remember_token' => str_random(10),
            'address' => 'Da Nang',
            'phone' => '01223499433',
        ]);
    }

}
