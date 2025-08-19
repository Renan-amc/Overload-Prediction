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
        DB::table('users')->insert([
            [
                'username' => 'renanzin@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'munera@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
