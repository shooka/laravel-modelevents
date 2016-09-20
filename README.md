# Laravel ModelEvents

[![Build Status](https://travis-ci.org/shooka/laravel-modelevents.svg?branch=develop)](https://travis-ci.org/shooka/laravel-modelevents)
[![Coverage Status](https://coveralls.io/repos/shooka/laravel-modelevents/badge.svg?branch=develop)](https://coveralls.io/r/shooka/laravel-modelevents?branch=develop)

Have you ever wanted a place to put your eloquent model events? It is now easier than ever to apply listeners to your models.

## Installation

Add this package to your Laravel project by running:

```bash
composer require shooka/laravel-modelevents 0.3.*
```

To publish the necessary files, add the ServiceProvider to the array of providers in `config/app.php`:
```php
Shooka\ModelEvents\ServiceProvider::class,
```

Next, publish the files by running:

```bash
php artisan vendor:publish --provider="Shooka\ModelEvents\ServiceProvider"
```

This publishes two files:
 * A `ModelEvents/UserEvent.php` file that contains a dummy class that shows what future `ModelEvent`s are supposed to look like.
 * A `Providers/ModelEventServiceProvider.php` with an empty array of listeners that maps actual Eloquent model events to the `ModelEvent` classes.
 
As the new ServiceProvider has been published, you can add it to the array of providers:

```php
App\Providers\ModelEventServiceProvider::class,
```

And at the same time remove the first one from the array:

```php
Shooka\ModelEvents\ServiceProvider::class,
```
