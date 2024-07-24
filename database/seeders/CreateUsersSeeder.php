<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nom' => 'DRH USER',
                'email' => 'drh@gmail.com',
                'role' => 0,
                'password' => bcrypt('123456'),
            ],
            [
                'nom' => 'RH USER',
                'email' => 'rh@gmail.com',
                'role' => 1,
                'password' => bcrypt('123456'),
            ],
            [
                'nom' => 'DG USER',
                'email' => 'dg@gmail.com',
                'role' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'nom' => 'DAF USER',
                'email' => 'daf@gmail.com',
                'role' => 3,
                'password' => bcrypt('123456'),
            ],
        ];
        foreach($users as $key=>$user){
            User::create($user);
        }
    }
}
