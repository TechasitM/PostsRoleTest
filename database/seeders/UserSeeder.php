<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new\App\Models\User();
        $user->name = "Admin Laravel 9";
        $user->email = "laravel9@gmail.com";
        $user->password = Hash::make('password');
        $user->save();

        $user = new\App\Models\User();
        $user->name = "Admin Yii";
        $user->email = "yii@gmail.com";
        $user->password = Hash::make('password');
        $user->save();
    }
}
