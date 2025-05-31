<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'level' => 'admin',
            ],
            [
                'name' => 'Cashier User',
                'email' => 'cashier@example.com',
                'password' => Hash::make('password'),
                'level' => 'kasir',
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@example.com',
                'password' => Hash::make('password'),
                'level' => 'manajer',
            ],
        ]);
    }
}
