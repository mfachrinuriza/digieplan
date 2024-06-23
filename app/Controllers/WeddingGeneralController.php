<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FilterModel;
use App\Models\MusicModel;
use App\Models\PrayModel;
use App\Models\TransactionModel;

class WeddingGeneralController extends BaseController
{
    public function present()
    {
        if ($this->checkUserLogin()) {

            $data['title'] = getenv('TITLE_INVITATION_CONTENT_SETTING');
            $data['sub_title'] = getenv('SUBTITLE_GENERAL');
            $data['url_path'] = getenv('URL_GENERAL');

            $prayModel = new PrayModel();
            $data['praysData'] = $prayModel->get()->getResultArray();

            $data['transactionSelected'] = $this->getTransactionSelected();

            $musicModel = new MusicModel();
            $data['musicList'] = $musicModel->get()->getResultArray();

            $filterModel = new FilterModel();
            $data['filterInstagram'] = $filterModel->where('transaction_id', $data['transactionSelected']['id'])
                ->get()->getRowArray();

            $data['hasPraySelected'] = false;
            foreach ($data['praysData'] as $pray) {
                if ($data['transactionSelected']['pray_id'] === $pray['id']) {
                    $data['hasPraySelected'] = true;
                    $data['praySelected'] = $pray;
                }
            }

            $data['hasMusicSelected'] = false;
            foreach ($data['musicList'] as $music) {
                if ($data['transactionSelected']['music_id'] === $music['id']) {
                    $data['hasMusicSelected'] = true;
                    $data['musicSelected'] = $music;
                }
            }

            if ($this->hasThemeSelected() == true) {
                return view(getenv('PATH_GENERAL'), $data);
            } else {
                session()->setFlashdata('warning', 'Untuk melakukan kelola konten undangan, mohon terlebih dahulu memilih tema undangan anda!');
                return redirect()->to(base_url('/' . getenv(('URL_THEME'))));
            }
        } else {
            return redirect()->to(base_url('/' . getenv(('URL_LOGIN'))));
        }
    }

    public function requestUpdate()
    {
        $getPost = $this->request->getPost();
        $guestModel = new TransactionModel();
        $transactionSelected = $this->getTransactionSelected();

        $transactionSelected['pray_id'] = isset($getPost['pray_checkbox']) ? $getPost['pray_selected'] ?? 0 : 0;

        if (!isset($getPost['music_checkbox'])) {
            $transactionSelected['music_id'] = 0;
        } else {
            $transactionSelected['music_id'] = $getPost['music_id'];
        }

        if ($this->requestSubmitFilter($getPost)) {
            $process = $guestModel->update($transactionSelected['id'], $transactionSelected);
            if ($process) {
                session()->setFlashdata('success', 'Perubahan General berhasil!');
            } else {
                session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui General!');
            }
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui General!');
        }

        return redirect()->to(base_url(getenv('URL_GENERAL')));
    }

    public function requestSubmitFilter($getPost)
    {
        $filterModel = new FilterModel();
        $transactionSelected = $this->getTransactionSelected();
        $formField = array(
            'transaction_id'    => $transactionSelected['id'],
            'link_url'          => $getPost['link_url']
        );

        if (isset($getPost['filter_id']) && $getPost['filter_id'] != "") {
            return $filterModel->update($getPost['filter_id'], $formField);
        } else {
            return $filterModel->insert($formField);
        }
    }

    public function requestSelectMusic()
    {
        $getPost = $this->request->getPost();
        $transactionModel = new TransactionModel();
        $transactionData = $this->getTransactionSelected();
        $transactionData['music_id'] = $getPost['music_id'];
        $process = $transactionModel->update($transactionData['id'], $transactionData);
        if ($process) {
            session()->setFlashdata('success', 'Pilih musik berhasil!');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui General!');
        }

        return redirect()->to(base_url(getenv('URL_GENERAL')));
    }

    public function requestUpdateMusicStatus()
    {
        $getPost = $this->request->getPost();
        $transactionModel = new TransactionModel();
        $transactionData = $this->getTransactionSelected();
        $transactionData['is_music_active'] = $getPost['isChecked'];
        var_dump($getPost['music_id']);
        exit;
        // Attempt to update the record
        $process = $transactionModel->update($transactionData['id'], $transactionData);

        // Set the proper content type header for JSON
        $this->response->setContentType('application/json');

        if ($process) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'failed', 'error' => $transactionModel->getError()]);
        }
    }
}
