<?php

namespace Deegitalbe\LaravelTrustupIoUblToHtml\Facades;

use Deegitalbe\LaravelTrustupIoUblToHtml\LaravelTrustupIoUblToHtml;
use Henrotaym\LaravelPackageVersioning\Facades\Abstracts\VersionablePackageFacade;

/**
 * @method static bool getTrue()
 */
class LaravelTrustupIoUblToHtmlFacade extends VersionablePackageFacade
{
    public static function getPackageClass(): string
    {
        return LaravelTrustupIoUblToHtml::class;
    }
}
