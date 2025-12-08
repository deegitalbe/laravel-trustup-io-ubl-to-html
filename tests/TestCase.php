<?php

namespace Deegitalbe\LaravelTrustupIoUblToHtml\Tests;

use Deegitalbe\LaravelTrustupIoUblToHtml\LaravelTrustupIoUblToHtml;
use Deegitalbe\LaravelTrustupIoUblToHtml\Providers\LaravelTrustupIoUblToHtmlServiceProvider;
use Henrotaym\LaravelPackageVersioning\Testing\VersionablePackageTestCase;

class TestCase extends VersionablePackageTestCase
{
    public static function getPackageClass(): string
    {
        return LaravelTrustupIoUblToHtml::class;
    }

    public function getEnvironmentSetUp($app)
    {
        $this->loadMigrations();
    }

    public function getServiceProviders(): array
    {
        return [
            LaravelTrustupIoUblToHtmlServiceProvider::class,
        ];
    }

    protected function loadMigrations()
    {
        foreach ($this->getMigrations() as $migration) {
            app()->make($migration)->up();
        }
    }

    /**
     * Define your migrations files here.
     *
     * @return array<int, string>
     */
    protected function getMigrations(): array
    {
        return [];
    }
}
