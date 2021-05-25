<?php

namespace Grafstorm\Hitta\Tests;

use Grafstorm\Hitta\HittaServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            HittaServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        include_once __DIR__.'/../database/migrations/create_hittase-php-api-for-laravel_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
