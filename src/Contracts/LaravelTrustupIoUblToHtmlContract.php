<?php

namespace Deegitalbe\LaravelTrustupIoUblToHtml\Contracts;

use Henrotaym\LaravelContainerAutoRegister\Services\AutoRegister\Contracts\AutoRegistrableContract;
use Henrotaym\LaravelPackageVersioning\Services\Versioning\Contracts\VersionablePackageContract;

/**
 * Versioning package.
 */
interface LaravelTrustupIoUblToHtmlContract extends AutoRegistrableContract, VersionablePackageContract
{
    public function getTrue(): bool;
}
