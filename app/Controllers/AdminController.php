<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function announcements()
    {
        $model = new \App\Models\AnnouncementModel();
        $data['announcements'] = $model->orderBy('created_at', 'DESC')->findAll();
        return view('admin/announcements/index', $data);
    }

    public function createAnnouncement()
    {
        if ($this->request->getMethod() === 'GET') {
            return view('admin/announcements/create');
        }

        $model = new \App\Models\AnnouncementModel();
        $data = [
            'title' => trim($this->request->getPost('title')),
            'content' => trim($this->request->getPost('content')),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($model->insert($data)) {
            return redirect()->to('/admin/announcements')->with('success', 'Announcement created.');
        }

        return redirect()->back()->with('error', 'Failed to create announcement.');
    }

    public function editAnnouncement($id)
    {
        $model = new \App\Models\AnnouncementModel();

        if ($this->request->getMethod() === 'GET') {
            $announcement = $model->find($id);
            if (!$announcement) {
                return redirect()->to('/admin/announcements')->with('error', 'Announcement not found.');
            }
            return view('admin/announcements/edit', ['announcement' => $announcement]);
        }

        $data = [
            'title' => trim($this->request->getPost('title')),
            'content' => trim($this->request->getPost('content')),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/admin/announcements')->with('success', 'Announcement updated.');
        }

        return redirect()->back()->with('error', 'Failed to update announcement.');
    }

    public function deleteAnnouncement($id)
    {
        $model = new \App\Models\AnnouncementModel();
        if ($model->delete($id)) {
            return redirect()->to('/admin/announcements')->with('success', 'Announcement deleted.');
        }
        return redirect()->to('/admin/announcements')->with('error', 'Failed to delete announcement.');
    }
}
