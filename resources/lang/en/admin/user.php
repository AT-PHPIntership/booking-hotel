<?php

    /*
    |--------------------------------------------------------------------------
    | Admin layout localization
    |--------------------------------------------------------------------------
    |
    */

    return [
    // List user
    'user_list' => [
        'user_table' => 'Users List Table',
        'user_id' => '#',
        'user_name' => 'User Name',
        'user_role' => 'Role',
        'user_confirm' => 'Are you sure?',
        'user_delete' => 'Delete',
        'user_edit' => 'Edit',
        'user_show' => 'Detail',
    ],
    // Add User
    'user_add' => [
        // Localization UI
        'user_table' => 'Users List Table',
        'user_id' => '#',
        'user_name' => 'User Name',
        'user_email' => 'Email',
        'user_address' => 'Address',
        'user_phone' => 'Phone',
        'user_password' => 'Password',
        'user_password_confirm' => 'Password confirn',
        'user_role' => 'Role',
        'user_role_user' => 'User',
        'user_role_admin' => 'Admin',
        'user_create' => 'Create',
        'user_reset' => 'Reset',
        // Localization Messages
        'user_add_success' => 'Create Success!',
        'user_add_error' => 'Create Fail!',
        'user_username_required' => 'Username is empty',
        'user_username_string' => 'Username is a string',
        'user_username_max' => 'Username length less than 255 words',
        'user_username_unique' => 'Username is duplication',
        'user_email_required' => 'Email is empty',
        'user_email_string' => 'Email is a string',
        'user_email_email' => 'Format Email is wrong!',
        'user_email_max' => 'Email length less than 255 words',
        'user_email_unique' => 'Email is duplication',
        'user_phone_required' => 'Phone number is empty',
        'user_phone_regex' => 'Format phone is wrong!',
        'user_address_required' => 'Address is not empty',
        'user_address_max' => 'Address length less than 255 words',
        'user_password_required' => 'Password is empty',
        'user_password_string' => 'Password is a string',
        'user_password_min' => 'Password length more than 6 words',
        'user_password_confirmed' => 'Password is not incorrect',
        'user_role_check' => 'Role is admin or user',
    ],
    ];
