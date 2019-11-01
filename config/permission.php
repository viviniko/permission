<?php

return [

    'user' => 'Viviniko\Permission\Models\User',

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

    'permissions_table' => 'permission_permissions',

    'roles_table' => 'permission_roles',

    'model_has_permissions' => 'permission_permissionables',

    'model_has_roles' => 'permission_roleables',

    'role_has_permissions' => 'permission_role_permissions',
];