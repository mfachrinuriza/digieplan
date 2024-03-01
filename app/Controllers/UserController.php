<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UserController extends BaseController
{
    public function list_user()
    {
        $data['title'] = 'Kelola Pengguna | WeddingKu';
        $usersModel = new UsersModel();
        $data['listUsers'] = $usersModel->get()->getResultArray();
        echo view('admin/users', $data);
    }

    public function get_user($id)
    {
        $data['title'] = 'Kelola Pengguna | WeddingKu';
        $usersModel = new UsersModel();
        $data['userData'] = $usersModel->where('user_id', $id)->get()->getRowArray();
        echo view('admin/users', $data);
    }

    public function add_user()
    {
        $data['title'] = 'Tambah Pengguna | WeddingKu';
        echo view('admin/users_add', $data);
    }

    public function edit_user($id)
    {
        $data['title'] = 'Ubah Data Pengguna | WeddingKu';
        $usersModel = new UsersModel();
        $data['userData'] = $usersModel->where('user_id', $id)->get()->getRowArray();
        echo view('admin/users_edit', $data);
    }

    public function edit_user_process()
    {
        $getPost = $this->request->getPost();
        $usersModel = new UsersModel();
        $process = $usersModel->update($getPost['user_id'], $getPost);
        if ($process) {
            session()->setFlashdata('success', 'Proses perubahan data berhasil!');
            return redirect()->to(base_url('/admin/users'));
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui data akun!');
            return redirect()->to(base_url('/admin/users'));
        }
    }

    public function edit_user_inactive($id)
    {
        $updated = [
            'user_account_status' => '2'
        ];

        $usersModel = new UsersModel();
        $process = $usersModel->update($id, $updated);

        if ($process) {
            session()->setFlashdata('success', 'Proses Nonaktif Akun berhasil!');
            return redirect()->to(base_url('/admin/users'));
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menonaktifkan akun!');
            return redirect()->to(base_url('/admin/users'));
        }
    }
}
