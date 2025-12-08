<?php
namespace Henrotaym\LaravelTestSuite\Tests\Unit;

use Henrotaym\LaravelTestSuite\Testastos;
use Henrotaym\LaravelTestSuite\Tests\TestCase;

class InstallationProcessTest extends TestCase
{
    /**
     * @test
     */
    public function mocking_now_workin_as_expected()
    {
        $faked_now = now()->addDays(10);
        $this->assertInstanceOf(self::class, $this->mockCarbonNow($faked_now));
        $this->assertEquals($faked_now, now());
    }
}