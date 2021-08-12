<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"      => "Shubham",
            "user_type" => "0",
            "email"     => "shubham@mailinator.com",
            "password"  => Hash::make('12345678')
        ]);

        User::create([
            "name"      => "Roma",
            "user_type" => "1",
            "email"     => "roma@mailinator.com",
            "password"  => Hash::make('12345678')
        ]);

        User::create([
            "name"      => "Sheetal",
            "user_type" => "2",
            "email"     => "sheetal@mailinator.com",
            "password"  => Hash::make('12345678')
        ]);

    }
}
