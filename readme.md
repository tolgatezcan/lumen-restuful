# Lumen with JWT Authentication

Produces random hash with jwt in simple level and log hash operations using monolog..

## Getting Started

- Clone this repo or download it's release archive and extract it somewhere
- You may delete `.git` folder if you get this code via `git clone`
- Run `composer install`
- Run `php artisan jwt:secret`
- Configure your `.env` file for authenticating via database
- Create a table from the `users` name in the database (Includes email and password fields)

## Configure

```sh
# vendor/laravel/lumen-framework/config/auth.php with the following contents
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'api'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users'
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
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model'  => \App\User::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Here you may set the options for resetting passwords including the view
    | that is your password reset e-mail. You may also set the name of the
    | table that maintains all of the reset tokens for your application.
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        //
    ],

];
```

#### Run a PHP built in server from your root project

```sh
php -S localhost:8000 -t public/
```

#### Register Request (POST Method):

```sh
curl -i http://localhost:8000/register -d email=web@web.com -d password=123
```

#### Register Response:

```
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvbG9naW4iLCJpYXQiOjE1NTc2NzA3NTMsImV4cCI6MTU1NzY3NDM1MywibmJmIjoxNTU3NjcwNzUzLCJqdGkiOiJSNnNnWmF6TGZCZjdYREhWIiwic3ViIjoxNSwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.GHygZdoPweMeuvz6AdpCmRIdjdmj1hSEJVZUAGzPalE"
}
```

#### Login Request (POST Method):

```sh
curl -i http://localhost:8000/login -d email=web@web.com -d password=123
```

#### Login Response:

```
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvbG9naW4iLCJpYXQiOjE1NTc2NzA3NTMsImV4cCI6MTU1NzY3NDM1MywibmJmIjoxNTU3NjcwNzUzLCJqdGkiOiJSNnNnWmF6TGZCZjdYREhWIiwic3ViIjoxNSwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.GHygZdoPweMeuvz6AdpCmRIdjdmj1hSEJVZUAGzPalE"
}
```

#### Hast Request (GET Method):

```sh
curl -H "Authorization: Bearer <token>" http://localhost:8000/hash
```

#### Hash Response:

```
{
  "hash": "03669a578e1c8a128ab29b1465ef8f21"
}
```