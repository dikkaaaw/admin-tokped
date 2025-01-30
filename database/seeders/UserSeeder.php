<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'address' => 'Jl. Admin No. 1',
                'is_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'password' => password_hash('user12345', PASSWORD_DEFAULT),
                'address' => 'Jl. User No. 1',
                'is_admin' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'password' => password_hash('user12345', PASSWORD_DEFAULT),
                'address' => 'Jl. User No. 2',
                'is_admin' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        DB::table('users')->insert($users);
    }
}
