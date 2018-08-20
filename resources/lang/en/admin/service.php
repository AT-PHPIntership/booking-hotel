<?php

    /*
    |--------------------------------------------------------------------------
    | Admin layout localization
    |--------------------------------------------------------------------------
    |
    */

    return [
    // List service
    'service_list' => [
        'service_table' => 'Services List Table',
        'service_id' => '#',
        'service_name' => 'Service Name',
        'service_service_type' => 'Type',
        'service_status' => 'Status',
        'service_user_id' => 'User',
        'service_confirm' => 'Are you delete',
        'service_delete' => 'Delete',
        'service_edit' => 'Edit',
    ],
    // Add service
    'service_add' => [
        // Localization UI
        'service_table' => 'Services Add Table',
        'service_name' => 'Service Name',
        'service_service_type' => 'Service Type',
        'service_enable' => 'Enable',
        'service_disable' => 'Disable',
        'service_create' => 'Create',
        'service_reset' => 'Reset',
        // Localization Messages
        'service_add_success' => 'Add Success',
        'service_add_error' => 'Add Fail',
        'service_name_required' => 'Name is empty',
        'service_name_min' => 'Name length from 3 to 50 words',
        'service_name_max' => 'Name length from 3 to 50 words',
        'service_name_unique' => 'Name is duplicate',
        'service_type_eixst' => 'Service Type is not exist',
        'service_status_in' => 'Status is not exist'
    ],
    // Edit service
    'service_edit' => [
        // Localization UI
        'service_table' => 'Services List Table',
        'service_name' => 'Service Name',
        'service_service_type' => 'Service Type',
        'service_enable' => 'Enable',
        'service_disable' => 'Disable',
        'service_edit' => 'Edit',
        'service_reset' => 'Reset',
        // Localization Messages
        'service_edit_success' => 'Edit Success',
        'service_edit_error' => 'Edit Fail',
        'service_name_required' => 'Name is empty',
        'service_name_min' => 'Name length from 3 to 50 words',
        'service_name_max' => 'Name length from 3 to 50 words',
        'service_name_unique' => 'Name is duplicate',
        'service_type_eixst' => 'Service Type is not exist',
        'service_status_in' => 'Status is not exist',
    ],
    // Delete service
    'service_delete' => [
        // Localization Messages
        'service_delete_success' => 'Delete Success',
        'service_delete_error' => 'Delete Fail',
    ],
    ];
