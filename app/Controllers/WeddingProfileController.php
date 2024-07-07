<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfilesModel;

class WeddingProfileController extends BaseController
{
    public function present()
    {
        if ($this->checkUserLogin()) {

            $transactionSelected = $this->getTransactionSelected();

            $profilesModel = new ProfilesModel();
            $data['listProfiles'] = $profilesModel->where('transaction_id', $transactionSelected['id'])->get()->getResultArray();
            $data['title'] = getenv('TITLE_INVITATION_CONTENT_SETTING');;
            $data['sub_title'] = getenv('SUBTITLE_PROFILE');
            $data['url_path'] = getenv('URL_PROFILE');
            $data['transactionSelected'] = $transactionSelected;

            foreach ($data['listProfiles'] as $profile) {
                if ($profile['gender']) {
                    $data['profileGroom'] = $profile;
                } else {
                    $data['profileBride'] = $profile;
                }
            }

            if ($this->hasThemeSelected() == true) {
                return view(getenv('PATH_PROFILE'), $data);
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

        $profileModel = new ProfilesModel();
        // PROSES FORMULIR UNTUK REGISTER
        $temp = $_FILES['image_file']['tmp_name'];
        $image_name = rand(0, 9999) . $_FILES['image_file']['name'];

        // Specify the server path to the folder where you want to save the images
        $folder = FCPATH . '/assets/images/album/';

        $sizeInBytes = $_FILES['image_file']['size'];
        $sizeInMB = $sizeInBytes / (1024 * 1024); // Convert bytes to megabytes
        // Round the result to a desired number of decimal places
        $sizeInMB = round($sizeInMB, 2); // Adjust the number inside round() to change the precision

        if ($sizeInMB < 5) {
            // Logging to the browser console
            if ($this->uploadImage($temp, $folder, $image_name)) {
                // PROSES FORMULIR 

                $formField = array(
                    'user_id'               => $this->getUserId(),
                    'transaction_id'        => $this->getTransactionId(),
                    'fullname'              => $getPost['fullname'],
                    'nickname'              => $getPost['nickname'],
                    'gender'                => $getPost['gender'],
                    'father_name'           => $getPost['fatherName'],
                    'mother_name'           => $getPost['motherName'],
                    'social_media'          => $getPost['socialMedia'],
                    'photo'                 => $image_name
                );
                $process = $profileModel->insert($formField);
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

        return redirect()->to(base_url(getenv('URL_PROFILE')));
    }

    public function requestUpdate()
    {
        $getPost = $this->request->getPost();
        if (isset($_FILES['image_file']['name']) && $_FILES['image_file']['name'] != "") {
            // PROSES FORMULIR UNTUK REGISTER
            $temp = $_FILES['image_file']['tmp_name'];
            $image_name = rand(0, 9999) . $_FILES['image_file']['name'];

            // Specify the server path to the folder where you want to save the images
            $folder = FCPATH . '/assets/images/album/';

            $sizeInBytes = $_FILES['image_file']['size'];
            $sizeInMB = $sizeInBytes / (1024 * 1024); // Convert bytes to megabytes
            // Round the result to a desired number of decimal places
            $sizeInMB = round($sizeInMB, 2); // Adjust the number inside round() to change the precision
            $maxSize = 1;
            if ($sizeInMB < $maxSize) {
                // Logging to the browser console
                if ($this->uploadImage($temp, $folder, $image_name)) {
                    // PROSES FORMULIR 
                    $formField = array(
                        'user_id'               => $this->getUserId(),
                        'transaction_id'        => $this->getTransactionId(),
                        'fullname'              => $getPost['fullname'],
                        'nickname'              => $getPost['nickname'],
                        'gender'                => $getPost['gender'],
                        'father_name'           => $getPost['fatherName'],
                        'mother_name'           => $getPost['motherName'],
                        'social_media'          => $getPost['socialMedia'],
                        'photo'                 => $image_name
                    );
                    $this->saveProfile($formField, $getPost['id']);
                } else {
                    session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui foto profil!');
                }
            } else {
                session()->setFlashdata('error', 'Foto Cover melebihi ' . $maxSize . '!');
            }
        } else {
            // PROSES FORMULIR 
            $formField = array(
                'user_id'               => $this->getUserId(),
                'transaction_id'        => $this->getTransactionId(),
                'fullname'              => $getPost['fullname'],
                'nickname'              => $getPost['nickname'],
                'gender'                => $getPost['gender'],
                'father_name'           => $getPost['fatherName'],
                'mother_name'           => $getPost['motherName'],
                'social_media'          => $getPost['socialMedia']
            );
            $this->saveProfile($formField, $getPost['id']);
        }


        return redirect()->to(base_url(getenv('URL_PROFILE')));
    }

    private function saveProfile($formField, $id)
    {
        $profileModel = new ProfilesModel();

        $process = $profileModel->update($id, $formField);
        if ($process) {
            session()->setFlashdata('success', 'Perubahan profil berhasil!');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui profil!');
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
}
