<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuestModel;
use App\Models\ProfilesModel;

class CustomerGuestController extends BaseController
{
    
    public function present()
    {
        $data['title'] = getenv('TITLE_GUEST');
        $data['sub_title'] = null;
        $data['url_path'] = getenv('URL_GUEST');

        $data['modalNameCreate'] = "modal-guest-create";
        $data['modalNameUpdate'] = "modal-guest-update";

        $profilesModel = new ProfilesModel();
        $data['profileGroom'] = $profilesModel->where('transaction_id', session()->get('transaction_id'))
                                            ->where('gender', '1')
                                            ->get()->getRowArray();
                                            
        $data['profileBride'] = $profilesModel->where('transaction_id', session()->get('transaction_id'))
                                            ->where('gender', '0')
                                            ->get()->getRowArray();
                                            
        $transactionSelected = $this->getTransactionSelected();
        
        $guestModel = new GuestModel();
        $data['guestList']          = $guestModel->where('transaction_id', $transactionSelected['id'])
                                                ->get()->getResultArray();
        $data['guestAllList']       = $guestModel->where('transaction_id', $transactionSelected['id'])
                                                ->get()->getResultArray();
        $data['guestPresentList']   = $guestModel->where('transaction_id', $transactionSelected['id'])->where('status', "Hadir")
                                                ->get()->getResultArray();
        $data['guestUnpresentList'] = $guestModel->where('transaction_id', $transactionSelected['id'])
                                                ->where('status', "Tidak Hadir")
                                                ->get()->getResultArray();
        $data['guestInvitedList']   = $guestModel->where('transaction_id', $transactionSelected['id'])
                                                ->where('status', "Diundang")
                                                ->get()->getResultArray();
        $data['transactionsData']   = $this->getTransactionList();

        if ($this->checkUserLogin() == true) {
            return view(getenv('PATH_GUEST'), $data);
        } else {
            return redirect()->to(base_url(getenv('PATH_LOGIN')));
        }
    }

    public function requestCreate()
    {
        $getPost = $this->request->getPost();
        $guestModel = new GuestModel();
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

        return redirect()->to(base_url(getenv('PATH_GUEST')));
    }

    public function requestUpdate()
    {
        $getPost = $this->request->getPost();
        $guestModel = new GuestModel();
        
        $process = $guestModel->update($getPost['id'], $getPost);
        if ($process) {
            session()->setFlashdata('success', 'Perubahan Tamu berhasil!');
            return redirect()->to(base_url(getenv('PATH_GUEST')));
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui Tamu!');
            return redirect()->to(base_url(getenv('PATH_GUEST')));
        }
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

        return redirect()->to(base_url(getenv('PATH_GUEST')));
    }
}
