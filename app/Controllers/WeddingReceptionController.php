<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReceptionModel;

class WeddingReceptionController extends BaseController
{
    private function requestDataMapper($getPost)
    {
        return array(
            'transaction_id'    => $getPost['transaction_id'],
            'user_id'           => $getPost['user_id'],
            'title'             => $getPost['title'],
            'date'              => $getPost['date'],
            'start_time'        => $getPost['startTime'],
            'end_time'          => $getPost['endTime'] ?? "-",
            'time_zone'         => $getPost['timeZone'],
            'place_name'        => $getPost['placeName'],
            'address'           => $getPost['address'],
            'link_address'      => $getPost['linkAddress'],
            'isPrimary'         => $getPost['isPrimary'] ?? false ? "1" : "0",
            'isUntilEnd'        => $getPost['isUntilEnd'] ?? false ? "1" : "0"
        );
    }

    public function present()
    {
        if ($this->checkUserLogin()) {
            $transactionSelected = $this->getTransactionSelected();

            $receptionModel = new ReceptionModel();
            $data['receptionsData'] = $receptionModel->where('transaction_id', $transactionSelected['id'])
                ->get()->getResultArray();
            $data['transactionSelected'] = $transactionSelected;
            $data['title'] = getenv('TITLE_INVITATION_CONTENT_SETTING');
            $data['sub_title'] = getenv('SUBTITLE_RECEPTION');
            $data['url_path'] = getenv('URL_RECEPTION');
            $data['modalNameCreate'] = "modal-reception-create";
            $data['modalNameUpdate'] = "modal-reception-update";

            if ($this->hasThemeSelected() == true) {
                return view(getenv('PATH_RECEPTION'), $data);
            } else {
                session()->setFlashdata('warning', 'Untuk melakukan kelola konten undangan, mohon terlebih dahulu memilih tema undangan anda!');
                return redirect()->to(base_url(getenv(('URL_THEME'))));
            }
        } else {
            return redirect()->to(base_url(getenv(('PATH_LOGIN'))));
        }
    }

    public function requestValidationForm()
    {
        $getPost = $this->request->getPost();
        $receptionModel = new ReceptionModel();
        $receptionsData = $receptionModel->where('user_id', $this->getUserId())->get()->getResultArray();
        if (count($receptionsData) > 0) {
            if ($getPost['isPrimary']) {
                foreach ($receptionsData as $data) {
                    if ($data['isPrimary']) {
                        $data['isPrimary'] = false;
                        $change = $receptionModel->update($data['id'], $data);

                        if (!$change) {
                            session()->setFlashdata('error', 'Terjadi kesalahan saat tambah Acara!');
                        } else {
                            $this->requestCreate();
                        }

                        return redirect()->to(base_url(getenv('URL_RECEPTION')));
                    }
                }
            } else {
                $this->requestCreate();
            }
        } else {
            $this->requestCreate();
        }
    }

    public function requestCreate()
    {
        $getPost = $this->request->getPost();

        $receptionModel = new ReceptionModel();

        $created = $receptionModel->insert($this->requestDataMapper($getPost));

        if (!$created) {
            session()->setFlashdata('error', 'Terjadi kesalahan saat tambah Acara!');
        } else {
            session()->setFlashdata('success', 'Tambah Acara berhasil!');
        }

        return redirect()->to(base_url(getenv('URL_RECEPTION')));
    }

    public function requestUpdate()
    {
        $getPost = $this->request->getPost();
        $getPost['isPrimary'] = $getPost['isPrimary'] ?? false ? "1" : "0";
        $getPost['isUntilEnd'] = $getPost['isUntilEnd'] ?? false ? "1" : "0";

        $receptionModel = new ReceptionModel();
        $process = $receptionModel->update($getPost['id'], $this->requestDataMapper($getPost));

        if ($process) {
            session()->setFlashdata('success', 'Perubahan Acara berhasil!');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui Acara!');
        }

        return redirect()->to(base_url(getenv('URL_RECEPTION')));
    }

    public function requestDelete($id)
    {
        $receptionModel = new ReceptionModel();
        $process = $receptionModel->delete($id);
        if ($process) {
            session()->setFlashdata('success', 'Hapus Acara berhasil!');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat hapus Acara!');
        }

        return redirect()->to(base_url(getenv('URL_RECEPTION')));
    }
}
