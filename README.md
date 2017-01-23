# Core Game Platform

Using this package you can have a simple backoffice for your web game app or your facebook game application.
The package is using the Laravel Siderbar by Maatwebsite which gives you the ability to add your own package
on the side bar of the back office. 


The package offers:
 -Back-office
 -Installation Process
 -Facebook Integration
 -Google Analytics Integration

- [Installation](#installation)
- [Composer](#composer)
- [Service Provider](#service-provider)
- [Publish assets files](#publish-assets-files)
- [Middlewares](#middleware)
- [Configuration](#configuration)

## Installation

This package is very easy to set up. There are only couple of steps.

### Composer

Pull this package in through Composer.

```
composer require giwrgos88/core-game-platform
```

Run this command inside your terminal.

    composer update

### Service Provider

Add the package to your application service providers in `config/app.php` file.

```php
'providers' => [
    
    /**
     * Third Party Service Providers...
     */
    Giwrgos88\Game\Core\Providers\CoreServiceProvider::class,
],
```

### Publish assets files
Run the command to publish the assets of the package
```php
php artisan vendor:publish --provider="Giwrgos88\Game\Core\Providers\AssetsServiceProvider" --tag=config
php artisan vendor:publish --provider="Giwrgos88\Game\Core\Providers\AssetsServiceProvider" --tag=migrations
php artisan vendor:publish --provider="Giwrgos88\Game\Core\Providers\AssetsServiceProvider" --tag=seeds
php artisan vendor:publish --provider="Giwrgos88\Game\Core\Providers\AssetsServiceProvider" --tag=assets
```

### Middlewares
The package contains a middleware which force the request to be secured. 
```php
$router->get('/', [
    'as' => 'home',
    'middleware' => 'force_ssl',
    'uses' => 'HomeController@index',
]);
```

### Configuration
You can easily configure the settings of the package from core_game.php file.

The package is using the [coreui](http://coreui.io/) designed and built by [Lukasz Holeczed](https://about.me/lukaszholeczek)