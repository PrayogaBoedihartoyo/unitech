<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            ['name' => 'User 1', 'email' => 'user1@example.com', 'password' => bcrypt('password'), 'divisi_id' => 1],
            ['name' => 'User 2', 'email' => 'user2@example.com', 'password' => bcrypt('password'), 'divisi_id' => 2],
            ['name' => 'User 3', 'email' => 'user3@example.com', 'password' => bcrypt('password'), 'divisi_id' => 3],
            ['name' => 'User 4', 'email' => 'user4@example.com', 'password' => bcrypt('password'), 'divisi_id' => 4],
        ];
    
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
