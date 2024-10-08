<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                "name" => "Ilham Hafidz",
                "email" => "ilhammhafidzz@gmail.com",
                "password" => bcrypt("password")
            ],
            [
                "name" => "Test",
                "email" => "test@gmail.com",
                "password" => bcrypt("password")
            ],
        ]);
    }
}
