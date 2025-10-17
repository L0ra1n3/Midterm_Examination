<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Welcome Back Students!',
                'content' => 'We’re excited to start a new semester! Please check your class schedules.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'System Maintenance',
                'content' => 'The portal will undergo maintenance on Saturday at 10 PM.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('announcements')->insertBatch($data);
    }
}
