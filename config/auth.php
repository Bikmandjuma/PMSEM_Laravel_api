<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Authentication Settings
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You can change these defaults
    | as required, but they are a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'api', // Default guard
        'passwords' => 'users', // Default password reset option
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Here you may define every authentication guard for your application.
    | A default configuration has been defined for you here which uses
    | session storage and the Eloquent user provider.
    |
    | Supported: "session", "token", "jwt"
    |
    */

    'guards' => [
        'api' => [
            'driver' => 'jwt', // JSON Web Token authentication
            'provider' => 'users', // Users provider
        ],

        'admin' => [
            'driver' => 'jwt', // JSON Web Token authentication for admins
            'provider' => 'admins', // Admins provider
        ],

        'user' => [
            'driver' => 'jwt', // JSON Web Token authentication for users
            'provider' => 'users', // Users provider
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // Model for users
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class, // Model for admins
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users', // Matches the users provider
            'table' => 'password_reset_tokens', // Password reset tokens table
            'expire' => 60, // Token expiry time in minutes
            'throttle' => 60, // Throttle password reset attempts
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password. By
    | default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800, // Timeout for password confirmation in seconds

];
