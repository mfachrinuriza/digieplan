<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuestModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class CustomerPDFController extends BaseController
{

    public function present()
    {
        if ($this->checkUserLogin() == true) {
            // Load Dompdf library
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', TRUE);
            $options->set('debugKeepTemp', TRUE);
            $options->set('isHtml5ParserEnabled', TRUE);
            $options->set('chroot', '/');
            $options->setIsRemoteEnabled(true);
            $options->set('logOutputFile', WRITEPATH . 'logs/dompdf.log');

            $dompdf = new Dompdf($options);
            $dompdf->set_option('isRemoteEnabled', TRUE);
            // HTML content with background image and table
            $path = 'https://upload.wikimedia.org/wikipedia/en/thumb/e/eb/Manchester_City_FC_badge.svg/1200px-Manchester_City_FC_badge.png';
            $data['backgroundImageBase64'] = 'data:image/png;base64,' . base64_encode(file_get_contents($path));

            $guestModel = new GuestModel();
            $data['guestList']          = $guestModel->get()->getResultArray();
            $data['background_image']   = $path;
            $html = view('customer/guest_book_pdf', $data);

            // Load HTML content to Dompdf
            $dompdf->loadHtml($html, 'UTF-8');
            // Set paper size (A4)
            $dompdf->setPaper('A4', 'portrait');

            // Render PDF (first pass to get the total pages)
            $dompdf->render();

            // Output PDF
            $dompdf->stream('guest_book.pdf', array('Attachment' => 0));
        } else {
            return redirect()->to(base_url(getenv('PATH_LOGIN')));
        }
    }
}
