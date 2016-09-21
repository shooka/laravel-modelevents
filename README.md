# Laravel ModelEvents

[![Build Status](https://travis-ci.org/shooka/laravel-modelevents.svg?branch=develop)](https://travis-ci.org/shooka/laravel-modelevents)
[![Coverage Status](https://coveralls.io/repos/shooka/laravel-modelevents/badge.svg?branch=develop)](https://coveralls.io/r/shooka/laravel-modelevents?branch=develop)

Have you ever wondered where to put your eloquent model events? It is now easier than ever to apply listeners to your models.

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
 
As the new `ModelEventServiceProvider` has been published, you can add it to the array of providers:

```php
App\Providers\ModelEventServiceProvider::class,
```

>Don't forget to *remove* the original one from the array:
>```php
>Shooka\ModelEvents\ServiceProvider::class,
>```

## Usage

This package is making use of some of the great features of Laravel which means that it is very easy to use in both new and existing Laravel projects.

The events that are supported out of the box are the standard Laravel model events:
`creating`, `created`,
`updating`, `updated`, 
`saving`, `saved`, 
`deleting`, `deleted`, 
`restoring`, and `restored`

### Custom events

If you want to define any custom events, they should be added to the $observables array:

```php
class Product extends Model
{
    protected $observables = [
        'sold',
        'shipped',
        'returned',
        ...
    ];
}
```

Those events are now observable in the `ModelEvent`:

```php
class ProductEvent extends ModelEvent
{
    public function returned($product) {
        // Increase stock count
    }
}
```

### Activating a listener

To add a listener to an eloquent model, just map the model to a `ModelEvent` in the `ModelEventServiceProvider`:

```php
protected $listeners = [
    \App\Product::class => \App\ModelEvents\ProductEvent::class,
];
```

The `ModelEvent` could be placed anywhere, but is in this example put in the `ModelEvents` folder published by the command from the [Installation](#installation) chapter.