<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'level' => 1,
                'password' => bcrypt('123'),
                'repeat_password' => '123'
                
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}