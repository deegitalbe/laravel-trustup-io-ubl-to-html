<?php

namespace Deegitalbe\LaravelTrustupIoUblToHtml\Tests\Feature;

use Deegitalbe\LaravelTrustupIoUblToHtml\Contracts\LaravelTrustupIoUblToHtmlContract;
use Deegitalbe\LaravelTrustupIoUblToHtml\Enums\Locale;
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

    public function test_it_generates_html_from_ubl_for_fr()
    {
        $service = $this->app->make(UblToHtmlService::class);

        assertInstanceOf(UblToHtmlService::class, $service);

        $ublContent = file_get_contents(__DIR__.'/../Stubs/Xml/UBL-Invoice-2.1-Salameche.xml');

        // dd($ublContent);

        $htmlContent = $service->generate($ublContent, Locale::BE_FR->value);
        $base64Html = base64_encode($htmlContent);

        // Création de l'URI Data
        $dataUri = 'data:text/html;base64,'.$base64Html;

        // Option A : Afficher un lien sur lequel cliquer
        echo base64_decode(explode(',', $dataUri)[1]);
        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        $result = $dom->loadHTML($htmlContent);
        assertTrue($result);

    }

    public function test_it_generates_html_from_ubl_for_de()
    {
        $service = $this->app->make(UblToHtmlService::class);

        assertInstanceOf(UblToHtmlService::class, $service);

        $ublContent = file_get_contents(__DIR__.'/../Stubs/Xml/UBL-Invoice-2.1-Salameche.xml');

        // dd($ublContent);

        $htmlContent = $service->generate($ublContent, Locale::BE_DE->value);
        $base64Html = base64_encode($htmlContent);

        // Création de l'URI Data
        $dataUri = 'data:text/html;base64,'.$base64Html;

        // Option A : Afficher un lien sur lequel cliquer
        echo base64_decode(explode(',', $dataUri)[1]);
        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        $result = $dom->loadHTML($htmlContent);
        assertTrue($result);

    }

    public function test_it_generates_html_from_ubl_for_nl()
    {
        $service = $this->app->make(UblToHtmlService::class);

        assertInstanceOf(UblToHtmlService::class, $service);

        $ublContent = file_get_contents(__DIR__.'/../Stubs/Xml/UBL-Invoice-2.1-Salameche.xml');

        // dd($ublContent);

        $htmlContent = $service->generate($ublContent, Locale::BE_NL->value);
        $base64Html = base64_encode($htmlContent);

        // Création de l'URI Data
        $dataUri = 'data:text/html;base64,'.$base64Html;

        // Option A : Afficher un lien sur lequel cliquer
        echo base64_decode(explode(',', $dataUri)[1]);
        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        $result = $dom->loadHTML($htmlContent);
        assertTrue($result);

    }

    public function test_it_generates_html_from_ubl_for_en()
    {
        $service = $this->app->make(UblToHtmlService::class);

        assertInstanceOf(UblToHtmlService::class, $service);

        $ublContent = file_get_contents(__DIR__.'/../Stubs/Xml/UBL-Invoice-2.1-Salameche.xml');

        // dd($ublContent);

        $htmlContent = $service->generate($ublContent, Locale::BE_EN->value);
        $base64Html = base64_encode($htmlContent);

        // Création de l'URI Data
        $dataUri = 'data:text/html;base64,'.$base64Html;

        // Option A : Afficher un lien sur lequel cliquer
        echo base64_decode(explode(',', $dataUri)[1]);
        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        $result = $dom->loadHTML($htmlContent);
        assertTrue($result);

    }

    public function test_fr_fr_credit_note_uses_avoir()
    {
        $service = $this->app->make(UblToHtmlService::class);

        $ublContent = file_get_contents(__DIR__.'/../Stubs/Xml/UBL-CreditNote-2.1-Stub.xml');

        $htmlContent = $service->generate($ublContent, Locale::FR_FR->value);

        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        assertTrue($dom->loadHTML($htmlContent));

        $this->assertStringContainsString('AVOIR', $htmlContent);
        $this->assertStringNotContainsString('NOTE DE CRÉDIT', $htmlContent);
    }

    public function test_be_fr_credit_note_uses_note_de_credit()
    {
        $service = $this->app->make(UblToHtmlService::class);

        $ublContent = file_get_contents(__DIR__.'/../Stubs/Xml/UBL-CreditNote-2.1-Stub.xml');

        $htmlContent = $service->generate($ublContent, Locale::BE_FR->value);

        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        assertTrue($dom->loadHTML($htmlContent));

        $this->assertStringContainsString('NOTE DE CRÉDIT', $htmlContent);
        $this->assertStringNotContainsString('AVOIR', $htmlContent);
    }

    public function test_fr_fr_invoice_generates_valid_html()
    {
        $service = $this->app->make(UblToHtmlService::class);

        $ublContent = file_get_contents(__DIR__.'/../Stubs/Xml/UBL-Invoice-2.1-Salameche.xml');

        $htmlContent = $service->generate($ublContent, Locale::FR_FR->value);

        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        assertTrue($dom->loadHTML($htmlContent));

        $this->assertStringContainsString('FACTURE', $htmlContent);
    }

    public function test_it_can_assert_true_on_service()
    {
        $this->assertTrue(LaravelTrustupIoUblToHtmlFacade::getTrue());
    }

    public function test_it_can_instanciate_facade()
    {
        $this->assertInstanceOf(LaravelTrustupIoUblToHtml::class, $this->app->make(LaravelTrustupIoUblToHtmlContract::class));
    }

    public function test_it_parses_ubl_with_text_node_above_libxml_default_limit()
    {
        $service = $this->app->make(UblToHtmlService::class);

        $ublContent = file_get_contents(__DIR__.'/../Stubs/Xml/UBL-Invoice-2.1-Salameche.xml');

        // libxml's default max text-node length is ~10MB. Real-world Peppol/UBL
        // invoices can embed PDFs as base64 and exceed this. Without
        // LIBXML_PARSEHUGE, loadXML() aborts with "Text node too long".
        $hugeText = str_repeat('A', 11 * 1024 * 1024);
        $ublWithHugeTextNode = str_replace(
            '<cbc:Note>Cum.</cbc:Note>',
            '<cbc:Note>'.$hugeText.'</cbc:Note>',
            $ublContent
        );

        $htmlContent = $service->generate($ublWithHugeTextNode, Locale::BE_FR->value);

        $this->assertIsString($htmlContent);
        $this->assertNotEmpty($htmlContent);
    }
}
