<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;
use CodeIgniter\Controller;

class Announcement extends Controller
{
    public function index()
    {
        $model = new AnnouncementModel();
        $data['announcements'] = $model->orderBy('created_at', 'DESC')->findAll();

        return view('announcements', $data);
    }
}
