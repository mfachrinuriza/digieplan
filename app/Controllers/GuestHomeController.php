<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FilterModel;
use App\Models\GiftModel;
use App\Models\GuestModel;
use App\Models\ImagesModel;
use App\Models\LoveStoryModel;
use App\Models\MusicModel;
use App\Models\PrayModel;
use App\Models\ProfilesModel;
use App\Models\ReceptionModel;
use App\Models\ThemeModel;
use App\Models\TransactionModel;

use function PHPUnit\Framework\isEmpty;

class GuestHomeController extends BaseController
{

    function present($weddingName)
    {
        $transactionModel   = new TransactionModel();
        $profilesModel      = new ProfilesModel();
        $loveStoryModel     = new LoveStoryModel();
        $receptionModel     = new ReceptionModel();
        $imagesModel        = new ImagesModel();
        $praysModel         = new PrayModel();
        $giftModel          = new GiftModel();
        $guestModel         = new GuestModel();
        $themeModel         = new ThemeModel();
        $musicModel         = new MusicModel();
        $filterModel        = new FilterModel();

        $data['invited_to']         = $_GET['to'];
        $data['weddingName']        = $weddingName;
        $data['size']               = 5;
        $data['weddingData']        = $transactionModel->where('title_path', $weddingName)->get()->getRowArray();
        $data['prayData']           = $praysModel->where('id', $data['weddingData']['pray_id'])->get()->getRowArray();
        $data['invited_to']         = $this->request->getGet('to');
        $data['giftList']           = $giftModel->where('transaction_id', $data['weddingData']['id'])->get()->getResultArray();
        $data['music']              = $musicModel->where('id', $data['weddingData']['music_id'])->get()->getRowArray();
        $data['filter']             = $filterModel->where('transaction_id', $data['weddingData']['id'])->get()->getRowArray();
        // love story
        $data['loveStoryList']      = $loveStoryModel->where('transaction_id', $data['weddingData']['id'])->get()->getResultArray();

        // wishes list
        $data['wishesList'] = $guestModel->where('transaction_id', $data['weddingData']['id'])
            ->orderBy('created_date', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();
        $data['allWishesList'] = $guestModel->where('transaction_id', $data['weddingData']['id'])->orderBy('created_date', 'DESC')->get()->getResultArray();
        $data['totalWishesList'] = count(($data['allWishesList']));
        $data['themeData']    = $themeModel->where('id', $data['weddingData']['theme_id'])->get()->getRowArray();

        // image data
        $imageCoverData             = $imagesModel->where('transaction_id', $data['weddingData']['id'])->where('type', 'cover')->get()->getRowArray();
        $imageLoveStoryData         = $imagesModel->where('transaction_id', $data['weddingData']['id'])->where('type', 'love_story')->get()->getRowArray();

        $images_gallery             = $imagesModel->where('transaction_id', $data['weddingData']['id'])->where('type', 'gallery')->get()->getResultArray();
        $data['imageGalleryFirst']  = $images_gallery[0]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[0]['url_image']) : base_url('/assets/images/icon/default-upload.png');
        $data['imageGallerySecond'] = $images_gallery[1]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[1]['url_image']) : base_url('/assets/images/icon/default-upload.png');
        $data['imageGalleryThird']  = $images_gallery[2]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[2]['url_image']) : base_url('/assets/images/icon/default-upload.png');
        $data['imageGalleryFourth'] = $images_gallery[3]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[3]['url_image']) : base_url('/assets/images/icon/default-upload.png');
        $data['imageGalleryFifh']   = $images_gallery[4]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[4]['url_image']) : base_url('/assets/images/icon/default-upload.png');
        $data['imageGallerySixth']  = $images_gallery[5]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[5]['url_image']) : base_url('/assets/images/icon/default-upload.png');
        $data['imageGallerySeventh'] = $images_gallery[6]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[6]['url_image']) : base_url('/assets/images/icon/default-upload.png');
        $data['imageGalleryEighth'] = $images_gallery[7]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[7]['url_image']) : base_url('/assets/images/icon/default-upload.png');
        $data['imageGalleryNineth'] = $images_gallery[8]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[8]['url_image']) : base_url('/assets/images/icon/default-upload.png');
        $data['imageGalleryTenth']  = $images_gallery[9]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[9]['url_image']) : base_url('/assets/images/icon/default-upload.png');

        $basedImageAssetsPath       = base_url('/assets/images/album/');
        $basedImageAssetsGuestPath  = base_url('/AssetsGuest/image/template_a');

        $data['imageCoverPath']     = $imageCoverData != null ? $basedImageAssetsPath . '/' . $imageCoverData['url_image'] : $basedImageAssetsGuestPath . "/wedding-1850074_1280.jpg";
        $data['imageLoveStoryPath'] = $imageLoveStoryData != null ? $basedImageAssetsPath . '/' . $imageLoveStoryData['url_image'] : $basedImageAssetsGuestPath . "/wedding-6173363_1280.jpg";

        // Bride and Groom Data
        $data['groomData'] = $profilesModel->where('transaction_id', $data['weddingData']['id'])->where('gender', true)->get()->getRowArray();
        $data['brideData'] = $profilesModel->where('transaction_id', $data['weddingData']['id'])->where('gender', false)->get()->getRowArray();
        $eventTitle        = "Wedding of " . $data['brideData']['nickname'] . ' ' . $data['groomData']['nickname'];

        $data['primaryEventData']   = $receptionModel->where('transaction_id', $data['weddingData']['id'])->where('isPrimary', true)->get()->getRowArray();
        $data['primaryEventData']['end_time'] = isset($data['primaryEventData']['end_time']) && $data['primaryEventData']['end_time'] != '-' ? $data['primaryEventData']['end_time'] : "selesai";
        $data['eventData']          = $receptionModel->where('transaction_id', $data['weddingData']['id'])->where('isPrimary', false)->get()->getRowArray();
        $data['eventData']['end_time'] = isset($data['eventData']['end_time']) && $data['eventData']['end_time'] != "-" ? $data['eventData']['end_time'] : "selesai";

        if (isset($data['primaryEventData']['start_time']) && isset($data['primaryEventData']['end_time']) && $data['primaryEventData']['end_time'] != "") {
            list($startHour, $startMinute) = explode(":", $data['primaryEventData']['start_time']);
            $startHour = str_pad($startHour + 7, 2, "0", STR_PAD_LEFT);
            $startMinute = str_pad($startMinute, 2, "0", STR_PAD_LEFT);

            $endHour = 0;
            $endMinute = 0;
            if ($data['primaryEventData']['end_time'] != "selesai" && $data['primaryEventData']['end_time'] != "-") {
                list($endHour, $endMinute) = explode(":", $data['primaryEventData']['end_time']);
                $endHour = str_pad($endHour, 2, "0", STR_PAD_LEFT);
                $endMinute = str_pad($endMinute, 2, "0", STR_PAD_LEFT);
            } else {
                $endHour = str_pad($startHour + 2, 2, "0", STR_PAD_LEFT);
                $endMinute = str_pad($startMinute, 2, "0", STR_PAD_LEFT);
            }

            $startTime = $startHour . $startMinute;
            $endTime = $endHour . $endMinute;
            $startDates = date_format(date_create($data['primaryEventData']['date']), "Ymd") . "T" . $startTime . "Z";
            $endDates = date_format(date_create($data['primaryEventData']['date']), "Ymd") . "T" . $endTime . "Z";

            $desc =
                'Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami :
            
            *' . $data['brideData']['nickname'] . ' dan ' . $data['groomData']['nickname'] . '*
            
            Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.
            
            Mohon maaf perihal undangan hanya di bagikan melalui pesan ini.
            
            Kami yang berbahagia
            *' . $data['brideData']['nickname'] . ' dan ' . $data['groomData']['nickname'] . '*';

            $data['saveTheDateUrl'] =
                'https://www.google.com/calendar/render?action=TEMPLATE&text=' . $eventTitle . '&dates=' . $startDates . '/' . $endDates . '&details=' . $desc . '&location=' . $data['eventData']['place_name'] . '&sf=true&output=xml';
        }
        if (
            isset($data['weddingData'])
            && isset($data['groomData'])
            && isset($data['brideData'])
            && isset($data['primaryEventData'])
            && isset($data['giftList'])
            && isset($data['loveStoryList'])
            && isset($data['themeData'])
            && isset($data['loveStoriesData'])
            && count($images_gallery) > 0
        ) {
            if (strpos($data['themeData']['theme_code'], 'A') !== false) {
                return view('guest/index_a', $data);
            } else if (strpos($data['themeData']['theme_code'], 'B') !== false) {
                return view('guest/index_b', $data);
            }
        } else {
            return view('errors/html/error_404');
        }
    }

    function presentPreview($weddingName)
    {
        $transactionModel   = new TransactionModel();
        $profilesModel      = new ProfilesModel();
        $loveStoryModel     = new LoveStoryModel();
        $receptionModel     = new ReceptionModel();
        $imagesModel        = new ImagesModel();
        $praysModel         = new PrayModel();
        $giftModel          = new GiftModel();
        $guestModel         = new GuestModel();
        $themeModel         = new ThemeModel();
        $musicModel         = new MusicModel();
        $filterModel        = new FilterModel();

        $data['invited_to']         = $_GET['to'];
        $data['weddingName']        = $weddingName;
        $data['size']               = 5;
        $data['weddingData']        = $transactionModel->where('title_path', $weddingName)->get()->getRowArray();
        $data['prayData']           = $praysModel->where('id', $data['weddingData']['pray_id'])->get()->getRowArray();
        $data['invited_to']         = $this->request->getGet('to');
        $data['giftList']           = $giftModel->where('transaction_id', $data['weddingData']['id'])->get()->getResultArray();
        $data['music']              = $musicModel->where('id', $data['weddingData']['music_id'])->get()->getRowArray();
        $data['filter']             = $filterModel->where('transaction_id', $data['weddingData']['id'])->get()->getRowArray();
        // love story
        $data['loveStoryList']      = $loveStoryModel->where('transaction_id', $data['weddingData']['id'])->get()->getResultArray();

        // wishes list
        $data['wishesList'] = $guestModel->where('transaction_id', $data['weddingData']['id'])
            ->orderBy('created_date', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();
        $data['allWishesList'] = $guestModel->where('transaction_id', $data['weddingData']['id'])->orderBy('created_date', 'DESC')->get()->getResultArray();
        $data['totalWishesList'] = count(($data['allWishesList']));
        $data['themeData']    = $themeModel->where('id', $data['weddingData']['theme_id'])->get()->getRowArray();

        // image data
        $images_gallery     = $imagesModel->where('transaction_id', $data['weddingData']['id'])->where('type', 'gallery')->get()->getResultArray();
        if (count($images_gallery) > 0) {
            $data['imageGalleryFirst']  = $images_gallery[0]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[0]['url_image']) : base_url('/assets/images/icon/default-upload.png');
            $data['imageGallerySecond'] = $images_gallery[1]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[1]['url_image']) : base_url('/assets/images/icon/default-upload.png');
            $data['imageGalleryThird']  = $images_gallery[2]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[2]['url_image']) : base_url('/assets/images/icon/default-upload.png');
            $data['imageGalleryFourth'] = $images_gallery[3]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[3]['url_image']) : base_url('/assets/images/icon/default-upload.png');
            $data['imageGalleryFifh']   = $images_gallery[4]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[4]['url_image']) : base_url('/assets/images/icon/default-upload.png');
            $data['imageGallerySixth']  = $images_gallery[5]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[5]['url_image']) : base_url('/assets/images/icon/default-upload.png');
            $data['imageGallerySeventh'] = $images_gallery[6]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[6]['url_image']) : base_url('/assets/images/icon/default-upload.png');
            $data['imageGalleryEighth'] = $images_gallery[7]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[7]['url_image']) : base_url('/assets/images/icon/default-upload.png');
            $data['imageGalleryNineth'] = $images_gallery[8]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[8]['url_image']) : base_url('/assets/images/icon/default-upload.png');
            $data['imageGalleryTenth']  = $images_gallery[9]['url_image'] ?? null != null ? base_url('/assets/images/album/' . $images_gallery[9]['url_image']) : base_url('/assets/images/icon/default-upload.png');
        }

        $basedImageAssetsPath       = base_url('/assets/images/album/');
        $basedImageAssetsGuestPath  = base_url('/AssetsGuest/image/template_a');

        $imageCoverData             = $imagesModel->where('transaction_id', $data['weddingData']['id'])->where('type', 'cover')->get()->getRowArray();
        $imageLoveStoryData         = $imagesModel->where('transaction_id', $data['weddingData']['id'])->where('type', 'love_story')->get()->getRowArray();

        $data['imageCoverPath']     = $imageCoverData != null ? $basedImageAssetsPath . '/' . $imageCoverData['url_image'] : $basedImageAssetsGuestPath . "/wedding-1850074_1280.jpg";
        $data['imageLoveStoryPath'] = $imageLoveStoryData != null ? $basedImageAssetsPath . '/' . $imageLoveStoryData['url_image'] : $basedImageAssetsGuestPath . "/wedding-6173363_1280.jpg";

        // Bride and Groom Data
        $data['groomData']          = $profilesModel->where('transaction_id', $data['weddingData']['id'])->where('gender', true)->get()->getRowArray();
        $data['brideData']          = $profilesModel->where('transaction_id', $data['weddingData']['id'])->where('gender', false)->get()->getRowArray();
        $eventTitle = "Wedding of " . (isset($data['brideData']['nickname']) ? $data['brideData']['nickname'] : "Bride Name") . ' ' . (isset($data['groomData']['nickname']) ? $data['groomData']['nickname'] : "Groom Name");

        $data['primaryEventData']   = $receptionModel->where('transaction_id', $data['weddingData']['id'])->where('isPrimary', true)->get()->getRowArray();
        $data['primaryEventData']['end_time'] = isset($data['primaryEventData']['end_time']) && $data['primaryEventData']['end_time'] != '-' ? $data['primaryEventData']['end_time'] : "selesai";
        $data['eventData']          = $receptionModel->where('transaction_id', $data['weddingData']['id'])->where('isPrimary', false)->get()->getRowArray();
        $data['eventData']['end_time'] = isset($data['eventData']['end_time']) && $data['eventData']['end_time'] != "-" ? $data['eventData']['end_time'] : "selesai";

        if (isset($data['primaryEventData']['start_time']) && isset($data['primaryEventData']['end_time']) && $data['primaryEventData']['end_time'] != "") {
            list($startHour, $startMinute) = explode(":", $data['primaryEventData']['start_time']);
            $startHour = str_pad($startHour + 7, 2, "0", STR_PAD_LEFT);
            $startMinute = str_pad($startMinute, 2, "0", STR_PAD_LEFT);

            $endHour = 0;
            $endMinute = 0;
            if ($data['primaryEventData']['end_time'] != "selesai" && $data['primaryEventData']['end_time'] != "-") {
                list($endHour, $endMinute) = explode(":", $data['primaryEventData']['end_time']);
                $endHour = str_pad($endHour, 2, "0", STR_PAD_LEFT);
                $endMinute = str_pad($endMinute, 2, "0", STR_PAD_LEFT);
            } else {
                $endHour = str_pad($startHour + 2, 2, "0", STR_PAD_LEFT);
                $endMinute = str_pad($startMinute, 2, "0", STR_PAD_LEFT);
            }

            $startTime = $startHour . $startMinute;
            $endTime = $endHour . $endMinute;
            $startDates = date_format(date_create($data['primaryEventData']['date']), "Ymd") . "T" . $startTime . "Z";
            $endDates = date_format(date_create($data['primaryEventData']['date']), "Ymd") . "T" . $endTime . "Z";

            $desc =
                'Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami :
            
            *' . $data['brideData']['nickname'] . ' dan ' . $data['groomData']['nickname'] . '*
            
            Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.
            
            Mohon maaf perihal undangan hanya di bagikan melalui pesan ini.
            
            Kami yang berbahagia
            *' . $data['brideData']['nickname'] . ' dan ' . $data['groomData']['nickname'] . '*';

            $data['saveTheDateUrl'] =
                'https://www.google.com/calendar/render?action=TEMPLATE&text=' . $eventTitle . '&dates=' . $startDates . '/' . $endDates . '&details=' . $desc . '&location=' . $data['eventData']['place_name'] . '&sf=true&output=xml';
        }

        if (
            isset($data['weddingData'])
            && isset($data['groomData'])
            && isset($data['brideData'])
            && isset($data['primaryEventData'])
            && isset($data['primaryEventData']['title'])
            && count($data['loveStoryList']) > 0
            && isset($data['themeData'])
            && count($images_gallery) > 0
        ) {
            if (strpos($data['themeData']['theme_code'], 'A') !== false) {
                return view('guest/index_a', $data);
            } else if (strpos($data['themeData']['theme_code'], 'B') !== false) {
                return view('guest/index_b', $data);
            }
        } else {
            $errorMessage = "Untuk melihat preview undangan, mohon terlebih dahulu lengkapi informasi ";
            $errorMessage .= isset($data['weddingData']) ? "" : "Data Undangan, ";
            $errorMessage .= isset($data['groomData']) ? "" : "Data Pengantin Pria, ";
            $errorMessage .= isset($data['brideData']) ? "" : "Data Pengantin Wanita, ";
            $errorMessage .= isset($data['primaryEventData']) && isset($data['primaryEventData']['title']) ? "" : "Data Acara Utama, ";
            $errorMessage .= count($data['loveStoryList']) > 0 ? "" : "Data Love Story, ";
            $errorMessage .= isset($data['themeData']) ? "" : "Data Tema, ";
            $errorMessage .= count($images_gallery) > 0 ? "" : "Data Gallery, ";
            $errorMessage .= " Undangan Anda!";
            // Remove the trailing comma and space if any errors were concatenated
            $errorMessage = rtrim($errorMessage, ', ');
            session()->setFlashdata('warning', $errorMessage);
            return redirect()->to(base_url('/' . getenv(('URL_DASHBOARD'))));
        }
    }

    function requestUpdateWishesList($weddingName)
    {
        $guestModel = new GuestModel();
        $transactionModel = new TransactionModel();

        // Get the size parameter
        $size = isset($_GET['size']) ? $_GET['size'] : 5; // Default size is 10 if not provided

        // Fetch the wedding data
        $weddingData = $transactionModel->where('title_path', $weddingName)->get()->getRowArray();

        if (!$weddingData) {
            // Handle case where wedding data is not found
            return $this->response->setJSON(['error' => 'Wedding data not found']);
        }

        // Fetch the wishes list associated with the wedding
        $wishesList = $guestModel->where('transaction_id', $weddingData['id'])
            ->where('wishes IS NOT NULL')
            ->orderBy('created_date', 'DESC')
            ->limit($size)
            ->get()
            ->getResultArray();

        if (!$wishesList) {
            // Handle case where no wishes are found
            return $this->response->setJSON(['error' => 'No wishes found']);
        }

        return $this->response->setJSON($wishesList);
    }

    function requestSubmitRSVP()
    {
        $getPost = $this->request->getPost();

        $guestModel = new GuestModel();
        $status = "";
        if (strtolower($getPost['confirmation']) === "hadir") {
            $status = "Hadir";
        } else if (strtolower($getPost['confirmation']) === "tidak hadir") {
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
