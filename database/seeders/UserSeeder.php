<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'permission_id' => '1',
                'name' => 'superAdmin',
                'email' => 'admin@galatasaray.com',
                'password' => Hash::make('yonetici'),
                'role' => '1',
                'status' => '1',
                'mode' => '1',
            ]
        );
    }
}
