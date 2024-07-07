<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ImagesModel;
use App\Models\LoveStoryModel;

class WeddingLoveStoryController extends BaseController
{
    public function present()
    {
        if ($this->checkUserLogin()) {
            $transactionSelected = $this->getTransactionSelected();

            $imagesModel = new ImagesModel();
            $loveStoryModel = new LoveStoryModel();
            $data['loveStoryList'] = $loveStoryModel->where('transaction_id', $transactionSelected['id'])->get()->getResultArray();
            $data['transactionSelected'] = $this->getTransactionSelected();
            $imageData = $imagesModel->where('transaction_id', $data['transactionSelected']['id'])
                ->where('type', 'love_story')
                ->get()->getRowArray();

            $data['url_image'] = $imageData['url_image'] ?? "";

            $data['title'] = getenv('TITLE_INVITATION_CONTENT_SETTING');
            $data['sub_title'] = getenv('SUBTITLE_LOVE_STORY');
            $data['url_path'] = getenv('URL_LOVE_STORY');

            if ($this->hasThemeSelected() == true) {
                return view(getenv('PATH_LOVE_STORY'), $data);
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
        $isSuccess = false;

        for ($i = 1; $i < 3; $i++) {
            $id = $getPost['id' . $i] ?? 0;
            if ($id == 0 && $getPost['title' . $i] != null) {
                $request = array(
                    'title' => $getPost['title' . $i],
                    'story' => $getPost['story' . $i]
                );
                $isSuccess = $this->requestCreateData($request);
            } else if ($id != 0  && $getPost['title' . $i] != null) {
                $request = array(
                    'id'    => $getPost['id' . $i],
                    'title' => $getPost['title' . $i],
                    'story' => $getPost['story' . $i]
                );
                $isSuccess = $this->requestUpdateData($request);
            } else if ($id != 0 && $getPost['title' . $i] == null && $getPost['story' . $i] == null) {
                $isSuccess = $this->requestDeleteData($id);
            }
        }

        if (!$isSuccess) {
            session()->setFlashdata('error', 'Submit love story tidak berhasil!');
        } else {
            session()->setFlashdata('success', 'Submit love story berhasil!');
        }

        return redirect()->to(base_url(getenv('URL_LOVE_STORY')));
    }

    private function requestCreateData($request)
    {
        $loveStoryModel = new LoveStoryModel();
        $formField = array(
            'transaction_id'     => $this->getTransactionId(),
            'title'              => $request['title'],
            'story'              => $request['story']
        );
        $created = $loveStoryModel->insert($formField);
        if (!$created) {
            return false;
        } else {
            return true;
        }
    }

    private function requestUpdateData($request)
    {
        $loveStoryModel = new LoveStoryModel();
        $formField = array(
            'transaction_id'     => $this->getTransactionId(),
            'title'              => $request['title'],
            'story'              => $request['story']
        );
        $process = $loveStoryModel->update($request['id'], $formField);
        if (!$process) {
            return false;
        } else {
            return true;
        }
    }

    public function requestDeleteData($id)
    {
        $loveStoryModel = new LoveStoryModel();
        $process = $loveStoryModel->delete($id);
        if ($process) {
            return true;
        } else {
            return false;
        }
    }

    public function requestSubmitPhoto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $getPost = $this->request->getPost();

            $temp = $_FILES['image']['tmp_name'];
            $image_name = rand(0, 9999) . $_FILES['image']['name'];
            $type = $_FILES['image']['type'];

            // Specify the server path to the folder where you want to save the images
            $folder = FCPATH . '/assets/images/album/';

            $sizeInBytes = $_FILES['image']['size'];
            $sizeInMB = $sizeInBytes / (1024 * 1024); // Convert bytes to megabytes
            // Round the result to a desired number of decimal places
            $sizeInMB = round($sizeInMB, 2); // Adjust the number inside round() to change the precision

            if ($sizeInMB < 5) {
                // Logging to the browser console
                if ($this->uploadImage($temp, $folder, $image_name)) {
                    // PROSES FORMULIR 
                    $formField = array(
                        'transaction_id' => $getPost['transaction_id'],
                        'type'           => $getPost['type'],
                        'url_image'      => $image_name // Use the uploaded image name
                    );

                    $process = false;

                    if ($this->isAlreadyImageCover()) {
                        $process = $this->updateData($formField);
                    } else {
                        $process = $this->createData($formField);
                    }

                    if ($process) {
                        session()->setFlashdata('success', 'Submit Foto Cover Berhasil!');
                    } else {
                        session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui Foto Cover!');
                    }
                } else {
                    session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui Foto Cover!');
                }
            } else {
                session()->setFlashdata('error', 'Foto Cover melebihi 5MB!');
            }
            return redirect()->to(base_url(getenv('URL_LOVE_STORY')));
        }
    }

    // Separate function for file upload
    private function uploadImage($temp, $folder, $image_name)
    {
        if (move_uploaded_file($temp, $folder . $image_name)) {
            return true;
        } else {
            // Log or handle the error
            error_log("Failed to move uploaded file: " . $temp);
            return false;
        }
    }

    // Separate function for database operation
    private function createData($formField)
    {
        $imagesModel = new ImagesModel();
        return $imagesModel->insert($formField);
    }

    // Separate function for database operation
    private function updateData($formField)
    {
        $imagesModel = new ImagesModel();
        $imageData = $imagesModel->where('transaction_id', $formField['transaction_id'])
            ->where('type', 'love_story')
            ->get()->getRowArray();
        return $imagesModel->update($imageData['id'], $formField);
    }

    private function isAlreadyImageCover()
    {
        $imagesModel = new ImagesModel();
        $transactionSelected = $this->getTransactionSelected();
        $images_url = $imagesModel->where('transaction_id', $transactionSelected['id'])
            ->where('type', 'love_story')
            ->get()->getRowArray();

        if (isset($images_url) || $images_url != null) {
            return true;
        } else {
            return false;
        }
    }
}
