<?php

    /*
    |--------------------------------------------------------------------------
    | Admin layout localization
    |--------------------------------------------------------------------------
    |
    */

    return [
    // List cities
    'cities' => [
        'cities_table' => 'City table',
        'cities_number' => '#',
        'cities_name' => 'City',
        'country_name' => 'Country',
        'cities_edit' => 'Edit',
        'cities_delete' => 'Delete',
        'cities_confirm' => 'Are you sure?',
    ],

    // Edit city
    'city_edit' => [
        'city_table' => 'Edit City Table',
        'city_name' => 'City Name',
        'country_name' => 'Country Name',
        'submit' => 'Edit',
        'reset' => 'Reset',
        // Validation
        'rule_unique' => 'It was created',
        'rule_require' => 'Fill in the field',
    ],
    // Add city
    'city_add' => [
        'city_table' => 'Add City',
        'city' => 'City',
        'city_name' => 'Add Name City',
        'country' => 'Country',
        'country_name' => 'Add Name Country',
        'submit' => 'Add',
        'reset' => 'Reset',
        // Validation
        'rule_require' => 'Fill in the field',
        'rule_unique' => 'It was created',
    ],
    ];
