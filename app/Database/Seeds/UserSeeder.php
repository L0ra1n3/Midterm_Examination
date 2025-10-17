<?php namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $passwordAdmin = password_hash('Admin123!', PASSWORD_DEFAULT);
        $passwordTeacher = password_hash('Teacher123!', PASSWORD_DEFAULT);
        $passwordStudent = password_hash('Student123!', PASSWORD_DEFAULT);

        $data = [
            [
                'email' => 'admin@example.com',
                'password' => $passwordAdmin,
                'role' => 'admin',
                'username' => 'Admin User',
                'created_at' => Time::now()
            ],
            [
                'email' => 'teacher@example.com',
                'password' => $passwordTeacher,
                'role' => 'teacher',
                'username' => 'Teacher User',
                'created_at' => Time::now()
            ],
            [
                'email' => 'student@example.com',
                'password' => $passwordStudent,
                'role' => 'student',
                'username' => 'Student User',
                'created_at' => Time::now()
            ],
        ];

        // Check if users already exist to avoid duplicates
        $existingUsers = $this->db->table('users')->select('username')->get()->getResultArray();
        $existingUsernames = array_column($existingUsers, 'username');
        
        // Filter out users that already exist
        $newUsers = array_filter($data, function($user) use ($existingUsernames) {
            return !in_array($user['username'], $existingUsernames);
        });

        if (!empty($newUsers)) {
            try {
                $this->db->table('users')->insertBatch($newUsers);
                echo "Successfully seeded " . count($newUsers) . " new users.\n";
            } catch (\Exception $e) {
                echo "Error seeding users: " . $e->getMessage() . "\n";
            }
        } else {
            echo "All users already exist in the database. No new users were seeded.\n";
        }
    }
}
