<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'renanzin@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'image' => 'users/renan_couto.png'
            ],
            [
                'username' => 'munera@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'image' => 'users/lucas_muner.png'
            ],
        ];

        foreach ($users as $user) {
            if (!DB::table('users')->where('username', $user['username'])->exists()) {
                DB::table('users')->insert($user);
            }
        }
    }
}
