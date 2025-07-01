<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@hr.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('123'),
                'role'     => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'hrd@hr.com'],
            [
                'name'     => 'HRD',
                'password' => Hash::make('123'),
                'role'     => 'hrd',
            ]
        );

        User::updateOrCreate(
            ['email' => 'manager@hr.com'],
            [
                'name'     => 'Manager',
                'password' => Hash::make('123'),
                'role'     => 'manager',
            ]
        );
    }
}
