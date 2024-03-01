<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $data['title'] = 'Admin Dashboard | WeddingKu';
        return view('admin/dashboard', $data);
    }
}
