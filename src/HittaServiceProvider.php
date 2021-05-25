<?php

namespace Grafstorm\Hitta;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HittaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('hittase-php-api-for-laravel')
            ->hasConfigFile();
    }

    public function boot()
    {
        $apiKey = config('hittase-php-api-for-laravel.apiKey');
        $callerId = config('hittase-php-api-for-laravel.callerId');

        $this->app->bind('hittase-php-api-for-laravel', function ($app) use ($apiKey, $callerId) {
            return new Hitta($callerId, $apiKey);
        });
        parent::boot();
    }
}
