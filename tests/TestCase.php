<?php

namespace Shooka\ModelEvents\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->artisan('migrate', [
            '--database' => 'testbench',
            '--realpath' => realpath(__DIR__ . '/support/migrations'),
        ]);
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => __DIR__ . '/test.db',
            'prefix'   => '',
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            ModelEventServiceProvider::class,
        ];
    }
}