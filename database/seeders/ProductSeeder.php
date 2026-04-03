<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use DB;
use File ; 

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * * @return void
     */
    public function run()
        {
           $faker = Faker::create();

    foreach (range(1, 100) as $index) {

        $imageName = Str::random(10) . '.jpg';

        // โหลดรูปจาก internet
        $imageContent = file_get_contents('https://picsum.photos/450');

        // save ลงเครื่อง
        File::put(public_path('uploads/product/' . $imageName), $imageContent);

        // copy ไป resize (หรือจะใช้ Intervention ก็ได้)
        File::copy(
            public_path('uploads/product/' . $imageName),
            public_path('uploads/resize/' . $imageName)
        );

        DB::table('products')->insert([
            'name' => $faker->city,
            'detail' => $faker->paragraph(2),
            'price' => $faker->numberBetween(500, 8000),
            'stock'=> $faker->numberBetween(100, 1000),
            'image' => $imageName
        ]);
        }
    }
}
