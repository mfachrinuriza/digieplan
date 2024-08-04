<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuestModel;
use App\Models\TransactionModel;

class CustomerController extends BaseController
{

    public function present()
    {
        if ($this->checkUserLogin()) {
            $guestModel = new GuestModel();
            $transactionSelected = $this->getTransactionSelected();

            $data['title'] = getenv('TITLE_DASHBOARD');
            $data['sub_title'] = null;
            $data['hasThemeSelected'] = $this->hasThemeSelected();
            $data['transactionsData'] = $this->getTransactionList();
            $data['transactionSelected'] = $transactionSelected;
            $data['url_path'] = getenv('URL_DASHBOARD');

            $data['total'] = $guestModel->where('transaction_id', $transactionSelected['id'])
                ->countAllResults();
            $data['totalPresent'] = $guestModel->where('status', "Hadir")
                ->where('transaction_id', $transactionSelected['id'])
                ->countAllResults();
            $data['totalNotpresent'] = $guestModel->where('status', "Tidak Hadir")
                ->where('transaction_id', $transactionSelected['id'])
                ->countAllResults();
            $data['totalWishes'] = $guestModel->where('wishes !=', '')
                ->where('transaction_id', $transactionSelected['id'])
                ->countAllResults();

            return view(getenv('PATH_DASHBOARD'), $data);
        } else {
            return redirect()->to(base_url(getenv('PATH_LOGIN')));
        }
    }

    // public function requestEventSelected($id, $mainURL, $subUrl)
    // {
    //     $isSuccessUnselected = $this->requestEventUnselected();

    //     if ($isSuccessUnselected) {
    //         $transactionModel = new TransactionModel();
    //         $transactionData = $transactionModel->where('id', $id)->get()->getRowArray();
    //         $transactionData['isPrimary'] = true;

    //         $process = $transactionModel->update($id, $transactionData);
    //         if ($process) {
    //             session()->setFlashdata('success', 'Pilih Event berhasil!');
    //         } else {
    //             session()->setFlashdata('error', 'Terjadi kesalahan saat pilih Event!');
    //         }
    //     } else {
    //         session()->setFlashdata('error', 'Terjadi kesalahan saat pilih Event!');
    //     }


    //     return redirect()->to(base_url($mainURL . '/' . $subUrl));
    // }

    // public function requestHomeEventSelected($id, $subUrl)
    // {
    //     $isSuccessUnselected = $this->requestEventUnselected();

    //     if ($isSuccessUnselected) {
    //         $transactionModel = new TransactionModel();
    //         $transactionData = $transactionModel->where('id', $id)->get()->getRowArray();
    //         $transactionData['isPrimary'] = true;

    //         $process = $transactionModel->update($id, $transactionData);
    //         if ($process) {
    //             session()->setFlashdata('success', 'Pilih Event berhasil!');
    //         } else {
    //             session()->setFlashdata('error', 'Terjadi kesalahan saat pilih Event!');
    //         }
    //     } else {
    //         session()->setFlashdata('error', 'Terjadi kesalahan saat pilih Event!');
    //     }


    //     return redirect()->to(base_url('/' . $subUrl));
    // }

    // public function requestEventUnselected()
    // {
    //     $transactionModel = new TransactionModel();
    //     $transactionData = $transactionModel->where('user_id', $this->getUserId())
    //         ->where('isPrimary', '1')
    //         ->get()->getRowArray();

    //     if ($transactionData['isPrimary']) {
    //         $transactionData['isPrimary'] = false;

    //         $process = $transactionModel->update($transactionData['id'], $transactionData);
    //         if ($process) {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     } else {
    //         return true;
    //     }
    // }
}
