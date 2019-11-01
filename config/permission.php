<?php

return [

    'models' => [
        /*
        |--------------------------------------------------------------------------
        | Application User Model
        |--------------------------------------------------------------------------
        |
        | This is the User model used by Entrust to create correct relations.
        | Update the User if it is in a different namespace.
        |
        */
        'user' => 'Viviniko\Permission\Models\User',
    ],

    'table_names' => [
        /*
        |--------------------------------------------------------------------------
        | Application Users Table
        |--------------------------------------------------------------------------
        |
        | This is the users table used by the application to save users to the
        | database.
        |
        */
        'users_table' => 'permission_users',

        /*
        |--------------------------------------------------------------------------
        | Application Admin User Password Reset Table
        |--------------------------------------------------------------------------
        |
        | This is the users table used by the application to save users to the
        | database.
        |
        */
        'password_resets_table' => 'permission_password_resets',
    ],
];