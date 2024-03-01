<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf {

    public function generate($html, $filename='', $stream=TRUE) {
        
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options); 
        $dompdf->loadHtml(ob_get_clean());

        $dompdf->loadHtml($html);

        // Set paper size (A4)
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first pass to get the total pages)
        $dompdf->render();

        $output = $dompdf->output();

        if ($stream) {
            $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
        } else {
            return $output;
        }
    }
}
