<?php

namespace Deegitalbe\LaravelTrustupIoUblToHtml\Services;

use DOMDocument;
use XSLTProcessor;

class UblToHtmlService
{
    public function generate(string $ublContent): string
    {

        $xslPath = __DIR__.'/../Addons/UblToHtmlBuilder/XslFiles/render-billing-3.xsl';

        // dd($ublContent, $xslPath);

        if (! file_exists($ublContent)) {
            abort(404, 'Fichier XML introuvable.');
        }

        if (! file_exists($xslPath)) {
            abort(404, 'Fichier XSL introuvable.');
        }

        $xmlDoc = new DOMDocument;
        if (! $xmlDoc->load($ublContent)) {
            abort(500, 'Impossible de charger le fichier XML UBL.');
        }
        // 3. Charger le document XSL (la feuille de style)
        $xslDoc = new DOMDocument;
        if (! $xslDoc->load($xslPath)) {
            abort(500, 'Impossible de charger le fichier XSLT.');
        }
        // 4. Créer le processeur XSLT
        $processor = new XSLTProcessor;
        // Importer la feuille de style
        if (! $processor->importStylesheet($xslDoc)) {
            abort(500, 'Impossible d\'importer la feuille de style.');
        }
        // 5. Appliquer la transformation
        $html = $processor->transformToXml($xmlDoc);
        if ($html === false) {
            abort(500, 'La transformation XSLT a échoué.');
        }

        // 6. Envoyer le HTML à la vue
        return $html;
    }
}
