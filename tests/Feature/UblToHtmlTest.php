<?php
namespace Deegitalbe\LaravelTrustupIoUblToHtml\Tests\Feature;

use Deegitalbe\LaravelTrustupIoUblToHtml\Contracts\LaravelTrustupIoUblToHtmlContract;
use Deegitalbe\LaravelTrustupIoUblToHtml\Facades\LaravelTrustupIoUblToHtmlFacade;
use Deegitalbe\LaravelTrustupIoUblToHtml\LaravelTrustupIoUblToHtml;
use Deegitalbe\LaravelTrustupIoUblToHtml\Services\UblToHtmlService;
use Deegitalbe\LaravelTrustupIoUblToHtml\Tests\TestCase;
use Henrotaym\LaravelPackageVersioning\Testing\Traits\InstallPackageTest;
use Henrotaym\LaravelTestSuite\TestSuite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\assertInstanceOf;

class UblToHtmlTest extends TestCase 
{

    use InstallPackageTest, TestSuite, RefreshDatabase;

    public function test_it_generates_html_from_ubl()
    {
        $service = $this->app->make(UblToHtmlService::class);

        assertInstanceOf(UblToHtmlService::class, $service);

        $ublContent = __DIR__. '/../Stubs/xml/UBL-Invoice-2.1-Salameche.xml';

        // dd($ublContent);

        $htmlContent = $service->generate($ublContent);

        dd($htmlContent);

    }

    public function test_it_can_assert_true_on_service()  
    {
        $this->assertTrue(LaravelTrustupIoUblToHtmlFacade::getTrue());
    }

    public function test_it_can_instanciate_facade()
    {
        $this->assertInstanceOf(LaravelTrustupIoUblToHtml::class, $this->app->make(LaravelTrustupIoUblToHtmlContract::class));
    }
}