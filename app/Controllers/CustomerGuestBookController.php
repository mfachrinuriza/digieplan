<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuestModel;

class CustomerGuestBookController extends BaseController
{
    
    public function present()
    {
        $data['title'] = getenv('TITLE_GUEST_BOOK');
        $data['sub_title'] = null;
        $data['url_path'] = getenv('URL_GUEST_BOOK');

        $transactionSelected = $this->getTransactionSelected();

        $guestModel = new GuestModel();
        $data['guestList'] = $guestModel->where('transaction_id', $transactionSelected['id'])->get()->getResultArray();
        $data['transactionsData'] = $this->getTransactionList();
        
        if ($this->checkUserLogin() == true) {
            var_dump(getenv('PATH_GUEST_BOOK'));
            return view('customer/guest_book', $data);
        } else {
            return redirect()->to(base_url(getenv('PATH_LOGIN')));
        }
    }
}
