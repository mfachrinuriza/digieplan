<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BanksModel;
use App\Models\GiftModel;

class WeddingGiftController extends BaseController
{
    public function present()
    {
        if ($this->checkUserLogin()) {

            $transactionSelected = $this->getTransactionSelected();

            $banksModel = new BanksModel();
            $data['dataList'] = $banksModel->get()->getResultArray();
            $data['bankList'] = $banksModel->where('is_bank', '1')->get()->getResultArray();
            $data['ewalletList'] = $banksModel->where('is_bank', '0')->get()->getResultArray();

            $giftModel = new GiftModel();
            $data['giftList'] = $giftModel->where('transaction_id', $transactionSelected['id'])->get()->getResultArray();
            $data['transactionSelected'] = $transactionSelected;

            $data['title'] = getenv('TITLE_INVITATION_CONTENT_SETTING');
            $data['sub_title'] = getenv('SUBTITLE_GIFT');
            $data['url_path'] = getenv('URL_GIFT');
            $data['modalNameCreate'] = "modal-gift-create";
            $data['modalNameUpdate'] = "modal-gift-update";

            if ($this->hasThemeSelected() == true) {
                return view(getenv('PATH_GIFT'), $data);
            } else {
                session()->setFlashdata('warning', 'Untuk melakukan kelola konten undangan, mohon terlebih dahulu memilih tema undangan anda!');
                return redirect()->to(base_url('/' . getenv(('URL_THEME'))));
            }
        } else {
            return redirect()->to(base_url('/' . getenv(('PATH_LOGIN'))));
        }
    }

    public function requestCreate()
    {
        $getPost = $this->request->getPost();
        $giftModel = new GiftModel();
        // PROSES FORMULIR 
        $transactionSelected = $this->getTransactionSelected();

        $formField = array(
            'user_id'           => session()->get('user_id'),
            'transaction_id'    => $transactionSelected['id'],
            'type'              => $getPost['gift_type'],
            'bank_id'           => $getPost['gift_type'] == "Bank" ? $getPost['bank_id'] : $getPost['e_wallet_id'],
            'bank_name'         => $getPost['gift_type'] != "Address" ? $this->getBankName($getPost) : "",
            'account_number'    => $getPost['gift_type'] != "Address" ? $this->getAccountNumber($getPost) : "",
            'receiver_name'     => $this->getReceiverName($getPost),
            'receiver_address'  => $getPost['gift_type'] == "Address" ? $getPost['receiver_address'] : ""
        );

        $created = $giftModel->insert($formField);

        if (!$created) {
            session()->setFlashdata('error', 'Terjadi kesalahan saat tambah Hadiah!');
        } else {
            session()->setFlashdata('success', 'Tambah Hadiah berhasil!');
        }

        return redirect()->to(base_url(getenv('URL_GIFT')));
    }

    function getBankName($getPost)
    {
        $id = $getPost['gift_type'] == "Bank" ? $getPost['bank_id'] : $getPost['e_wallet_id'];

        $banksModel = new BanksModel();
        $bankData = $banksModel->where('id', $id)->get()->getRowArray();

        return $bankData['id'] != 99 ? $bankData['name'] : $getPost['bank_name'];
    }

    function getReceiverName($getPost)
    {
        if ($getPost['gift_type'] == "Bank") {
            return ($getPost['receiver_name_bank']);
        } else if ($getPost['gift_type'] == "E-Wallet") {
            return ($getPost['receiver_name_e_wallet']);
        } else {
            return ($getPost['receiver_name_address']);
        }
    }

    function getAccountNumber($getPost)
    {
        return
            $getPost['gift_type'] == "Bank"
            ?
            $getPost['bank_account_no']
            :
            $getPost['e_wallet_account_no'];
    }

    function getBankId($getPost)
    {
        return
            $getPost['gift_type'] == "Bank"
            ?
            $getPost['bank_id']
            :
            $getPost['e_wallet_id'];
    }

    public function requestUpdate()
    {
        $getPost = $this->request->getPost();
        $giftModel = new GiftModel();

        $formField = array(
            'user_id'           => session()->get('user_id'),
            'type'              => $getPost['gift_type'],
            'bank_id'           => $getPost['gift_type'] != "Address" ? $this->getBankId($getPost) : "",
            'bank_name'         => $getPost['gift_type'] != "Address" ? $this->getBankName($getPost) : "",
            'account_number'    => $getPost['gift_type'] != "Address" ? $this->getAccountNumber($getPost) : "",
            'receiver_name'     => $getPost['receiverName'],
            'receiver_address'  => $getPost['gift_type'] == "Address" ? $getPost['receiverAddress'] : ""
        );

        $process = $giftModel->update($getPost['id'], $formField);
        if ($process) {
            session()->setFlashdata('success', 'Perubahan hadiah berhasil!');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui hadiah!');
        }

        return redirect()->to(base_url(getenv('URL_GIFT')));
    }

    public function requestDelete($id)
    {
        $giftModel = new GiftModel();
        $process = $giftModel->delete($id);
        if ($process) {
            session()->setFlashdata('success', 'Hapus hadiah berhasil!');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat hapus hadiah!');
        }

        return redirect()->to(base_url(getenv('URL_GIFT')));
    }
}
