<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GalleryOptionModel;
use App\Models\ImagesModel;
use App\Models\TransactionModel;

class WeddingGalleryController extends BaseController
{
    public function presentGallery()
    {
        if ($this->checkUserLogin()) {

            $imagesModel = new ImagesModel();
            $galleryOptionModel = new GalleryOptionModel();

            $data['title'] = getenv('TITLE_INVITATION_CONTENT_SETTING');
            $data['sub_title'] = getenv('SUBTITLE_GALLERY');
            $data['url_path'] = getenv('URL_GALLERY');

            $data['transactionSelected'] = $this->getTransactionSelected();
            $galleryOptionId = $data['transactionSelected']['gallery_option_id'];

            if ($galleryOptionId != 0) {
                $galleryOptionSelected = $galleryOptionModel->where('id', $data['transactionSelected']['gallery_option_id'])->get()->getRowArray();
            }

            $data['galleryOptionSelected'] = $galleryOptionSelected ?? null;

            $data['galleryOptionList'] = $galleryOptionModel->get()->getResultArray();
            $data['imagesList'] = $imagesModel->where('transaction_id', $data['transactionSelected']['id'])
                ->where('type', 'gallery')
                ->get()->getResultArray();
            if ($this->hasThemeSelected() == true) {
                return view(getenv('PATH_GALLERY'), $data);
            } else {
                session()->setFlashdata('warning', 'Untuk melakukan kelola konten undangan, mohon terlebih dahulu memilih tema undangan anda!');
                return redirect()->to(base_url('/' . getenv(('URL_THEME'))));
            }
        } else {
            return redirect()->to(base_url('/' . getenv(('PATH_LOGIN'))));
        }
    }

    public function requestCreateGallery()
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

            if ($sizeInMB < 2) {
                // Logging to the browser console
                if ($this->uploadImage($temp, $folder, $image_name)) {
                    // PROSES FORMULIR 
                    $imagesFormField = array(
                        'transaction_id' => $getPost['transaction_id'],
                        'type'           => $getPost['type'],
                        'url_image'      => $image_name // Use the uploaded image name
                    );

                    $process = false;

                    if ($this->isAlreadyImageCover($getPost['id'])) {
                        $process = $this->updateData($imagesFormField, $getPost['id']);
                    } else {
                        $process = $this->createData($imagesFormField);
                    }

                    if ($process) {
                        $transactionModel = new TransactionModel();
                        $transactionSelected = $this->getTransactionSelected();
                        $transactionSelected['gallery_option_id'] = $getPost['gallery_option_id'];
                        $transactionModel->update($transactionSelected['id'], $transactionSelected);
                        session()->setFlashdata('success', 'Submit Foto Cover Berhasil!');
                    } else {
                        session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui Foto Cover!');
                    }
                } else {
                    session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui Foto Cover!');
                }
            } else {
                session()->setFlashdata('error', 'Foto Cover melebihi 2MB!');
            }
            return redirect()->to(base_url(getenv('URL_GALLERY')));
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
    private function updateData($formField, $id)
    {
        $imagesModel = new ImagesModel();
        return $imagesModel->update($id, $formField);
    }

    private function isAlreadyImageCover($id)
    {
        $imagesModel = new ImagesModel();
        $transactionSelected = $this->getTransactionSelected();
        $images_url = $imagesModel->where('id', $id)
            ->where('type', 'gallery')
            ->get()->getRowArray();

        if (isset($images_url) || $images_url != null) {
            return true;
        } else {
            return false;
        }
    }

    function requestUpdateGalleryOption()
    {
        $getPost = $this->request->getPost();

        $transactionModel = new TransactionModel();
        $transactionSelected = $this->getTransactionSelected();
        $transactionSelected['gallery_option_id'] = $getPost['gallery_option_id'];
        $process = $transactionModel->update($transactionSelected['id'], $transactionSelected);

        return redirect()->to(base_url(getenv('URL_GALLERY')));
    }
}
