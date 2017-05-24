<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | ACL Redirect to Page Not Found page
    |--------------------------------------------------------------------------
    |
    | You need create this page, and set it URL
    |
    */
    
    'pageNotFound' => '/',
    
    /*
    |--------------------------------------------------------------------------
    | ACL Redirect to Access Denied page
    |--------------------------------------------------------------------------
    |
    | The key of the 'permissions' must be the name of the route or its action.
    | The value is an array of roles that are allowed to access.
    |
    */
    
    'accessDenied' => '/',
    
    /*
    |--------------------------------------------------------------------------
    | ACL Permissions
    |--------------------------------------------------------------------------
    |
    | The key of the 'permissions' must be the name of the route or its action.
    | The value is an array of roles that are allowed to access.
    |
    */
    
    'permissions' => [
    //    'main' => ['guest', 'user'],
    //    'login' => ['guest'],
    //    'logout' => ['user'],
    //    'App\Http\Controllers\UserController@edit' => ['user'],
    ],
];
