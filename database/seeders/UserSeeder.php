<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'Admin',
                'telp' => '087824318334',
                'nik' => '',
            ],
            [
                'name' => 'Feri',
                'email' => 'feri@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'Admin',
                'telp' => '087824318224',
                'nik' => '',
            ],
            [
                'name' => 'Pertugas',
                'email' => 'pertugas@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'Petugas',
                'telp' => '087824318334',
                'nik' => '',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'User',
                'telp' => '087824318322',
                'nik' => '12007802',
            ]
        ];
        User::insert($data);
    }
}
