<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Pak Dosan',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('041205'),
            ],
            [
                'name' => 'Bu Operator',
                'email' => 'operator@gmail.com',
                'role' => 'operator',
                'password' => bcrypt('041205'),
            ],
        ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
