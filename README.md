# Laravel-ACL

[![Laravel](https://img.shields.io/badge/Laravel-~5.0-orange.svg?style=flat-square)](http://laravel.com)
[![Source](http://img.shields.io/badge/source-MykolaVuy/laravel--acl-blue.svg?style=flat-square)](https://github.com/MykolaVuy/Laravel-ACL/)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

Access Control List in Laravel

## Requirements

PHP 7.0+

## Getting Started
1. Add in user table column 'role' or create migration

```php
$table->enum('role', ['admin','user'])->default('user');
```

2. Add the middleware to your `app/Http/Kernel.php`.

```php
protected $middlewareGroups = [
        'web' => [
			....
            \App\Http\Middleware\ACL::class,
        ],
];
```
3. Set permissions in config/acl.php
