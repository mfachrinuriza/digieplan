<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GuestController extends BaseController
{
    public function tambah_event()
    {
        $data['title'] = 'Tambah Event';
        return view('event/tambah_event', $data);
    }
}
