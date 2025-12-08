<?php

namespace Deegitalbe\LaravelTrustupIoUblToHtml\Providers;

use Deegitalbe\LaravelTrustupIoUblToHtml\LaravelTrustupIoUblToHtml;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;

class LaravelTrustupIoUblToHtmlServiceProvider extends VersionablePackageServiceProvider
{
    public static function getPackageClass(): string
    {
        return LaravelTrustupIoUblToHtml::class;
    }

    protected function addToRegister(): void
    {
        //
    }

    protected function addToBoot(): void
    {
        //
    }
}
