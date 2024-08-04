<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\PackageModel;
use App\Models\TransactionModel;
use App\Models\UsersModel;

class AuthController extends BaseController
{
    public function login()
    {
        $data['title'] = 'Login Dashboard Panel | WeddingKu';
        return view(getenv('PATH_LOGIN'), $data);
    }

    public function login_process()
    {
        $getPost = $this->request->getPost();

        // VALIDASI AKUN
        $usersModel = new UsersModel();
        $checkAccount = $usersModel->where('user_email', $getPost['user_email'])->get()->getRowArray();
        if (!$checkAccount) {
            session()->setFlashdata('error', 'Akun tidak terdaftar! Harap lakukan registrasi');
            return redirect()->to(base_url(getenv('PATH_LOGIN')));
        } else {
            $transactionModel = new TransactionModel();
            $transactionData = $transactionModel->where('user_id', $checkAccount['user_id'])
                ->where('isPrimary', '1')
                ->get()->getRowArray();


            if (md5($getPost['user_password']) !== $checkAccount['user_password']) {
                session()->setFlashdata('error', 'Password yang dimasukkan salah!');
                return redirect()->to(base_url(getenv('PATH_LOGIN')));
            }

            if ($checkAccount['user_account_status'] !== '1') {
                session()->setFlashdata('error', 'Maaf! akun anda terblokir atau dinonaktifkan!');
                return redirect()->to(base_url(getenv('PATH_LOGIN')));
            }

            // LAKUKAN PROSES LOGIN
            $sessionSet = array(
                'user_id'       => $checkAccount['user_id'],
                'user_name'     => $checkAccount['user_name'],
                'user_email'    => $checkAccount['user_email'],
                'user_phone'    => $checkAccount['user_phone'],
                'user_level'    => $checkAccount['user_level'],
                'is_login'      => true,
                'transaction_id' => $transactionData['id'] ?? null
            );

            session()->set($sessionSet);

            if ($checkAccount['user_level'] === 'Customer') {
                // DASHBOARD BRIDE
                return redirect()->to(base_url('customer/dashboard'));
            } else if ($checkAccount['user_level'] === 'Admin') {
                // DASHBOARD ADMIN
                return redirect()->to(base_url('admin/'));
            }
        }
    }

    // public function register()
    // {
    //     $packageModel = new PackageModel();
    //     $data['packageList'] = $packageModel->get()->getResultArray();

    //     $data['title'] = 'Register Dashboard Panel | WeddingKu';
    //     return view(getenv('PATH_REGISTER'), $data);
    // }

    // public function register_process()
    // {
    //     $getPost = $this->request->getPost();

    //     // VALIDASI FORMULIR
    //     if ($getPost['user_password'] !== $getPost['user_password_confirm']) {
    //         session()->setFlashdata('error', 'Password tidak sama dengan Password Konfirmasi!');
    //         return redirect()->to(base_url(getenv('PATH_REGISTER')));
    //     }

    //     // VALIDASI AKUN
    //     $usersModel = new UsersModel();
    //     $is_already_registed = $usersModel->where('user_email', $getPost['user_email'])->get()->getRowArray();
    //     if ($is_already_registed) {
    //         session()->setFlashdata('error', 'Akun telah terdaftar, harap login atau hubungi administrator!');
    //         return redirect()->to(base_url(getenv('PATH_LOGIN')));
    //     }

    //     // PROSES FORMULIR UNTUK REGISTER
    //     $formField = array(
    //         'user_name'              => $getPost['user_name'],
    //         'user_email'             => $getPost['user_email'],
    //         'user_password'          => md5($getPost['user_password']),
    //         'user_phone'             => $getPost['user_phone'],
    //         'user_account_status'    => 1,
    //         'user_level'             => 'Customer'
    //     );

    //     $register = $usersModel->insert($formField);

    //     if (!$register) {
    //         session()->setFlashdata('error', 'Pendaftaran tidak berhasil!');
    //         return redirect()->to(base_url(getenv('PATH_REGISTER')));
    //     } else {
    //         session()->setFlashdata('success', 'Pendaftaran akun berhasil! silahkan login');
    //         return redirect()->to(base_url(getenv('PATH_LOGIN')));
    //     }
    // }


    // public function admin_register_process()
    // {
    //     $getPost = $this->request->getPost();

    //     $getPost['user_password'] = '12345678';
    //     $getPost['user_password_confirm'] = '12345678';

    //     // VALIDASI FORMULIR
    //     if ($getPost['user_password'] !== $getPost['user_password_confirm']) {
    //         session()->setFlashdata('error', 'Password tidak sama dengan Password Konfirmasi!');
    //         return redirect()->to(base_url(getenv('PATH_LOGIN')));
    //     }

    //     // VALIDASI AKUN
    //     $usersModel = new UsersModel();
    //     $is_already_registed = $usersModel->where('user_email', $getPost['user_email'])->get()->getRowArray();
    //     if ($is_already_registed) {
    //         session()->setFlashdata('error', 'Akun telah terdaftar, harap login atau hubungi administrator!');
    //         return redirect()->to(base_url(getenv('PATH_LOGIN')));
    //     }

    //     // PROSES FORMULIR UNTUK REGISTER
    //     $formField = array(
    //         'user_name'              => $getPost['user_name'],
    //         'user_email'             => $getPost['user_email'],
    //         'user_password'          => md5($getPost['user_password']),
    //         'user_phone'             => $getPost['user_phone'],
    //         'user_account_status'    => 1,
    //         'user_level'             => $getPost['user_level']
    //     );

    //     $register = $usersModel->insert($formField);

    //     if (!$register) {
    //         session()->setFlashdata('error', 'Pendaftaran tidak berhasil!');
    //         return redirect()->to(base_url('/admin/users'));
    //     } else {
    //         session()->setFlashdata('success', 'Pendaftaran akun berhasil! silahkan login');
    //         return redirect()->to(base_url('/admin/users'));
    //     }
    // }



    // public function forgot_password()
    // {
    //     // 
    // }

    // public function logout()
    // {
    //     session()->destroy();
    //     session()->setFlashdata('success', 'Berhasil keluar dengan aman!');
    //     return redirect()->to(base_url(getenv('PATH_LOGIN')));
    // }
}
