<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ImagesModel;

class WeddingCoverController extends BaseController
{
    public function presentCover()
    {
        if ($this->checkUserLogin()) {
            $imagesModel = new ImagesModel();

            $data['title'] = getenv('TITLE_INVITATION_CONTENT_SETTING');
            $data['sub_title'] = getenv('SUBTITLE_MAIN_PAGE');
            $data['url_path'] = getenv('URL_MAIN_PAGE');
            $data['transactionSelected'] = $this->getTransactionSelected();
            $imageData = $imagesModel->where('transaction_id', $data['transactionSelected']['id'])
                ->where('type', 'cover')
                ->get()->getRowArray();

            $data['url_image'] = $imageData['url_image'] ?? "";
            if ($this->hasThemeSelected() == true) {
                return view(getenv('PATH_MAIN_PAGE'), $data);
            } else {
                session()->setFlashdata('warning', 'Untuk melakukan kelola konten undangan, mohon terlebih dahulu memilih tema undangan anda!');
                return redirect()->to(base_url('/' . getenv(('URL_THEME'))));
            }
        } else {
            return redirect()->to(base_url('/' . getenv(('PATH_LOGIN'))));
        }
    }

    public function requestCreateCover()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $getPost = $this->request->getPost();

            $temp = $_FILES['image']['tmp_name'];
            $image_name = rand(0, 9999) . $_FILES['image']['name'];
            $type = $_FILES['image']['type'];

            // Specify the server path to the folder where you want to save the images
            $folder = FCPATH . 'assets/images/album/';

            $sizeInBytes = $_FILES['image']['size'];
            $sizeInMB = $sizeInBytes / (1024 * 1024); // Convert bytes to megabytes
            // Round the result to a desired number of decimal places
            $sizeInMB = round($sizeInMB, 2); // Adjust the number inside round() to change the precision
            $maxSize = 2; // 2MB
            if ($sizeInMB < $maxSize) {
                // Check if the directory exists, if not, create it
                if (!is_dir($folder)) {
                    mkdir($folder, 0777, true);
                }

                // Move the uploaded file to the destination directory
                if (move_uploaded_file($temp, $folder . $image_name)) {
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
                session()->setFlashdata('error', 'Foto Cover melebihi ' . $maxSize . 'MB!');
            }
            return redirect()->to(base_url(getenv('URL_MAIN_PAGE')));
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
            ->where('type', 'cover')
            ->get()->getRowArray();
        return $imagesModel->update($imageData['id'], $formField);
    }

    private function isAlreadyImageCover()
    {
        $imagesModel = new ImagesModel();
        $transactionSelected = $this->getTransactionSelected();
        $images_url = $imagesModel->where('transaction_id', $transactionSelected['id'])
            ->where('type', 'cover')
            ->get()->getRowArray();

        if (isset($images_url) || $images_url != null) {
            return true;
        } else {
            return false;
        }
    }
}
