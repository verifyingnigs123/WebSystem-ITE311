<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

class Announcement extends BaseController
{
    public function index()
    {
        $announcementModel = new AnnouncementModel();
        $announcements = $announcementModel->getAllAnnouncements();
        
        $data = [
            'announcements' => $announcements,
            'title' => 'Announcements'
        ];
        
        return view('announcements', $data);
    }
}
