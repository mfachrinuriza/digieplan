<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuestModel;
use App\Models\ProfilesModel;

class CustomerGuestController extends BaseController
{

    public function present()
    {
        if ($this->checkUserLogin()) {
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
            $data['transactionSelected'] = $transactionSelected;
            $guestModel = new GuestModel();
            $data['guestList'] = $guestModel
                ->where('transaction_id', $transactionSelected['id'])
                ->where('wishes IS NOT NULL', NULL)
                ->get()
                ->getResultArray();
            $data['guestAllList'] = $guestModel
                ->where('transaction_id', $transactionSelected['id'])
                ->where('wishes IS NULL')
                ->get()
                ->getResultArray();
            $data['guestPresentList'] = $guestModel
                ->where('transaction_id', $transactionSelected['id'])
                ->where('status', "Hadir")
                ->get()
                ->getResultArray();
            $data['guestUnpresentList'] = $guestModel
                ->where('transaction_id', $transactionSelected['id'])
                ->where('status', "Tidak Hadir")
                ->get()
                ->getResultArray();
            $data['guestInvitedList']   = $guestModel
                ->where('transaction_id', $transactionSelected['id'])
                ->where('status', "Diundang")
                ->get()
                ->getResultArray();
            $data['transactionsData']   = $this->getTransactionList();

            $shareWhatsappPath = "https://api.whatsapp.com/send/?phone=6281230000244&text=%20Sistem%20akan%20otomatis%20mengirimkan%20Whatsapp%20ke%20nomor%20Indomaret%20sebagai%20bukti%20verifikasi%20*Lupa%20Kata%20Sandi*%20kamu%2C%20dengan%20format%20sebagai%20berikut%3A%E2%80%A8%0A%0A*Klik%20Indomaret%20-%20Mohon%20tidak%20mengubah%20isi%20teks%20verifikasi%20ini.*%E2%80%A8%0A%0ATgl%2FJam%20%3A%2010012024%20-%2013%3A37%20%0AKode%20Verifikasi%20%3A%20*74765968c67007219b197f4d9aafb4e2*%0A%0APastikan%20nomor%20WhatsApp%20ini%20sama%20dengan%20nomor%20yang%20kamu%20gunakan%20ketika%20registrasi.%20Kirim%20teks%20ini%20tanpa%20mengubah%20isi%20untuk%20melakukan%20verifikasi%2C%20lalu%20ikuti%20petunjuk%20berikutnya.";

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
            'transaction_id' => $this->getTransactionId(),
            'name'          => $getPost['fullname'],
            'invite_with'   => $getPost['invite_with'] != "Tidak Ada" ? $getPost['invite_with'] : "",
            'status'        => "Diundang"
        );

        $created = $guestModel->insert($formField);

        if (!$created) {
            session()->setFlashdata('error', 'Terjadi kesalahan saat tambah Tamu!');
        } else {
            session()->setFlashdata('success', 'Tambah Tamu berhasil!');
        }

        return redirect()->to(base_url(getenv('URL_GUEST')));
    }

    public function requestUpdate()
    {
        $getPost = $this->request->getPost();
        $guestModel = new GuestModel();

        $process = $guestModel->update($getPost['id'], $getPost);
        if ($process) {
            session()->setFlashdata('success', 'Perubahan Tamu berhasil!');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui Tamu!');
        }

        return redirect()->to(base_url(getenv('URL_GUEST')));
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

        return redirect()->to(base_url(getenv('URL_GUEST')));
    }
}
