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
        $user = new \App\Models\User();
        $user->name = "Admin Laravel 9";
        $user->email = "laravel9@gmail.com";
        $user->password = Hash::make('password');
        $user->role = 1;
        $user->status = 1;
        $user->save();

        $user = new \App\Models\User();
        $user->name = "Admin Yii";
        $user->email = "yii@gmail.com";
        $user->password = Hash::make('password');
        $user->role = 1;
        $user->status = 1;
        $user->save();

        //\App\Models\user::factory()->count(20)->create();
        $user = new \App\Models\User();
        $user->name = "User Guest";
        $user->email = "guest@gmail.com";
        $user->password = Hash::make('password');
        $user->role = 0;
        $user->status = 1;
        $user->save();
    }
}
