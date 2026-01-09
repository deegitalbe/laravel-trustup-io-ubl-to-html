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

use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertTrue;

class UblToHtmlTest extends TestCase
{
    use InstallPackageTest, RefreshDatabase, TestSuite;

    public function test_it_generates_html_from_ubl()
    {
        $service = $this->app->make(UblToHtmlService::class);

        assertInstanceOf(UblToHtmlService::class, $service);

        $ublContent = file_get_contents(__DIR__.'/../Stubs/Xml/UBL-Invoice-2.1-Salameche.xml');

        // dd($ublContent);

        $htmlContent = $service->generate($ublContent, 'fr');
        $base64Html = base64_encode($htmlContent);

        // Création de l'URI Data
        $dataUri = 'data:text/html;base64,'.$base64Html;

        // Option A : Afficher un lien sur lequel cliquer
        echo $dataUri;
        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        $result = $dom->loadHTML($htmlContent);
        assertTrue($result);

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
