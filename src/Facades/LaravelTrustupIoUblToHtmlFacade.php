<?php
namespace Deegitalbe\LaravelTrustupIoUblToHtml\Facades;

use Deegitalbe\LaravelTrustupIoUblToHtml\LaravelTrustupIoUblToHtml;
use Deegitalbe\LaravelTrustupIoUblToHtml\Services\UblToHtmlService;
use Henrotaym\LaravelPackageVersioning\Facades\Abstracts\VersionablePackageFacade;

class LaravelTrustupIoUblToHtmlFacade extends VersionablePackageFacade
{
    public static function getPackageClass(): string
    {
        return LaravelTrustupIoUblToHtml::class;
    }

}