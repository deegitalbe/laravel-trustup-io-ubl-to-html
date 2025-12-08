<?php
namespace Henrotaym\LaravelTestSuite\Tests;

use Henrotaym\LaravelTestSuite\TestSuite;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use TestSuite;

    protected function getPackageProviders($app)
    {
        return [];
    }
}