<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuestModel;
use App\Models\TransactionModel;

class PartyController extends BaseController
{
    
    public function present()
    {
        return view('party/index');
        // if ($this->checkUserLogin() == true) {
        //     return view('party/index');
        // } else {
        //     return redirect()->to(base_url(getenv('PATH_LOGIN')));
        // }
    }
}
