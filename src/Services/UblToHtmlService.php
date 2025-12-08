<?php

namespace Deegitalbe\LaravelTrustupIoUblToHtml\Services;

use DOMDocument;
use XSLTProcessor;

class UblToHtmlService
{
    public function generate(string $ublContent): string
    {
        // Path to your XSL file (this *is* a file path)
        $xslPath = __DIR__.'/../Addons/UblToHtmlBuilder/XslFiles/render-billing-3.xsl';

        if (! file_exists($xslPath)) {
            abort(404, 'Fichier XSL introuvable.');
        }

        // 1. Load XML string
        $xmlDoc = new DOMDocument;
        $xmlDoc->preserveWhiteSpace = false;
        $xmlDoc->formatOutput = false;

        if (! $xmlDoc->loadXML($ublContent)) {
            abort(500, 'Impossible de charger le XML UBL depuis la chaîne.');
        }

        // 2. Load XSL file
        $xslDoc = new DOMDocument;
        if (! $xslDoc->load($xslPath)) {
            abort(500, 'Impossible de charger le fichier XSLT.');
        }

        // 3. Prepare the processor
        $processor = new XSLTProcessor;
        if (! $processor->importStylesheet($xslDoc)) {
            abort(500, 'Impossible d\'importer la feuille XSL.');
        }

        // 4. Transform to HTML
        $html = $processor->transformToXML($xmlDoc);
        if ($html === false) {
            abort(500, 'La transformation XSLT a échoué.');
        }

        return $html;
    }
}
