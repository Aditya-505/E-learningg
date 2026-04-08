<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin ESA',
                'email' => 'admin@gmail.com',
                'password' => 'password',
                'role' => 'admin',
            ],
            [
                'name' => 'Guru ESA',
                'email' => 'guru@gmail.com',
                'password' => 'guru1234',
                'role' => 'guru',
            ],
            [
                'name' => 'Siswa ESA',
                'email' => 'siswa@gmail.com',
                'password' => 'siswa1234',
                'role' => 'siswa',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make($user['password']),
                    'role' => $user['role'],
                ]
            );
        }
    }
}
