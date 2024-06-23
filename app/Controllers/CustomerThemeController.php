<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuestModel;
use App\Models\ThemeModel;
use App\Models\TransactionModel;

class CustomerThemeController extends BaseController
{
    public function present()
    {
        if ($this->checkUserLogin()) {

            $data['title'] = getenv('TITLE_THEME');
            $data['sub_title'] = null;
            $data['url_path'] = getenv('URL_THEME');
            $data['transactionsData'] = $this->getTransactionList();
            $data['transactionSelected'] = $this->getTransactionSelected();

            $themeModel = new ThemeModel();
            $data['themeList'] = $themeModel->get()->getResultArray();

            return view(getenv('PATH_THEME'), $data);
        } else {
            return redirect()->to(base_url(getenv('PATH_LOGIN')));
        }
    }

    public function requestCreate()
    {
        $getPost = $this->request->getPost();
        $guestModel = new ThemeModel();
        // PROSES FORMULIR 
        $formField = array(
            'name'          => $getPost['fullname'],
            'invite_with'   => "Keluarga",
            'status'        => "Diundang"
        );

        $created = $guestModel->insert($formField);

        if (!$created) {
            session()->setFlashdata('error', 'Terjadi kesalahan saat tambah Tamu!');
        } else {
            session()->setFlashdata('success', 'Tambah Tamu berhasil!');
        }

        return redirect()->to(base_url(getenv('URL_THEME')));
    }

    public function requestSelect()
    {
        $getPost = $this->request->getPost();
        $transactionModel = new TransactionModel();
        $transactionData = $this->getTransactionSelected();
        $transactionData['theme_id'] = $getPost['theme_id'];
        $process = $transactionModel->update($transactionData['id'], $transactionData);
        if ($process) {
            session()->setFlashdata('success', 'Pilih tema berhasil!');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui Tamu!');
        }

        return redirect()->to(base_url(getenv('URL_THEME')));
    }

    public function requestDelete($id)
    {
        $guestModel = new GuestModel();
        $process = $guestModel->delete($id);
        if ($process) {
            session()->setFlashdata('success', 'Hapus tamu berhasil!');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat hapus tamu!');
        }

        return redirect()->to(base_url(getenv('URL_THEME')));
    }
}
