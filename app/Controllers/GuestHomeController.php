<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuestModel;
use App\Models\ImagesModel;
use App\Models\LoveStoryModel;
use App\Models\PrayModel;
use App\Models\ProfilesModel;
use App\Models\ReceptionModel;
use App\Models\TransactionModel;

class GuestHomeController extends BaseController
{
    
    public function present($weddingName)
    {
        $transactionModel   = new TransactionModel();
        $profilesModel      = new ProfilesModel();
        $loveStoryModel     = new LoveStoryModel();
        $receptionModel     = new ReceptionModel();
        $imagesModel        = new ImagesModel();
        $praysModel         = new PrayModel();
        
        $data['weddingData']        = $transactionModel->where('title_path', $weddingName)->get()->getRowArray();
        $data['groomData']          = $profilesModel->where('transaction_id', $data['weddingData']['id'])->where('gender', true)->get()->getRowArray();
        $data['brideData']          = $profilesModel->where('transaction_id', $data['weddingData']['id'])->where('gender', false)->get()->getRowArray();
        $data['primaryEventData']   = $receptionModel->where('transaction_id', $data['weddingData']['id'])->where('isPrimary', true)->get()->getRowArray();
        $data['eventData']          = $receptionModel->where('transaction_id', $data['weddingData']['id'])->where('isPrimary', false)->get()->getRowArray();
        $data['prayData']           = $praysModel->where('id', $data['weddingData']['pray_id'])->get()->getRowArray();
        $data['loveStoriesData']    = $loveStoryModel->where('transaction_id', $data['weddingData']['id'])->get()->getResultArray();
        $data['invited_to']         = $this->request->getGet('to');
        $imageCoverData             = $imagesModel->where('transaction_id', $data['weddingData']['id'])->where('type', 'cover')->get()->getRowArray(); 
        $imageLoveStoryData         = $imagesModel->where('transaction_id', $data['weddingData']['id'])->where('type', 'love_story')->get()->getRowArray();     
        
        $basedImageAssetsPath       = base_url('public/assets/images/album/');
        $basedImageAssetsGuestPath  = base_url('public/AssetsGuest/image/');

        $data['imageCoverPath']     = $imageCoverData != null ? $basedImageAssetsPath.$imageCoverData['url_image'] : $basedImageAssetsGuestPath."wedding-1850074_1280.jpg";
        $data['imageLoveStoryPath'] = $imageLoveStoryData != null ? $basedImageAssetsPath.'/'.$imageLoveStoryData['url_image'] : $basedImageAssetsGuestPath."wedding-6173363_1280.jpg";

        return view('guest/index', $data);
    }

    public function presentTest()
    {
        return view('guest/test');
    }

    public function requestSubmitRSVP() {
        $getPost = $this->request->getPost();

        $guestModel = new GuestModel();
        $status = "";
        if ($getPost['confirmation'] === "ya") {
            $status = "Hadir";
        } else if ($getPost['confirmation'] === "tidak") {
            $status = "Tidak Hadir";
        }

        // PROSES FORMULIR 
        $formField = array(
            'transaction_id' => $getPost['transaction_id'],
            'name'          => $getPost['name'],
            'status'        => $status,
            'total_guest'   => $getPost['amount'],
            'wishes'        => $getPost['wish']
        );
        
        $request = $guestModel->insert($formField);

        // Return a response (you can customize this based on your needs)
        echo json_encode(array('status' => 'success'));
    }
}
