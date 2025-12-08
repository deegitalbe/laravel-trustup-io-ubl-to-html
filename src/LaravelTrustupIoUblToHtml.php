<?php
namespace Deegitalbe\LaravelTrustupIoUblToHtml;

use Deegitalbe\LaravelTrustupIoUblToHtml\Contracts\LaravelTrustupIoUblToHtmlContract;
use Henrotaym\LaravelPackageVersioning\Services\Versioning\VersionablePackage;

class LaravelTrustupIoUblToHtml extends VersionablePackage implements LaravelTrustupIoUblToHtmlContract
{
    public static function prefix(): string
    {
        return "laravel-trustup-io-package-boilerplate";
    }

    public function getTrue(): bool
    {
      return true;
    }
}