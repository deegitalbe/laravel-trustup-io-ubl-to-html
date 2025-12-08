<?php
namespace Deegitalbe\LaravelTrustupIoUblToHtml\Contracts;

use Henrotaym\LaravelPackageVersioning\Services\Versioning\Contracts\VersionablePackageContract;
use Henrotaym\LaravelContainerAutoRegister\Services\AutoRegister\Contracts\AutoRegistrableContract;

/**
 * Versioning package.
 */
interface LaravelTrustupIoUblToHtmlContract extends VersionablePackageContract, AutoRegistrableContract
{
    public function getTrue(): bool;
}