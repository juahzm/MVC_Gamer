<?php


namespace App\Controllers;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController {

    public function index()
    {
        //la fonction genere le pdf//
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        
        $html = '<h1>Components List!</h1><p>.</p>';

        
        $dompdf->loadHtml($html);

       
        $dompdf->setPaper('A4');

        
        $dompdf->render();

        
        return $dompdf->stream("example.pdf", array("Attachment" => 0)); 
    }


}

