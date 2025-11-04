<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
       public function run(): void
    {
        $categories = [
            [
                'name' => 'news',
                'slug' => 'أخبار',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'sport',
                'slug' => 'رياضة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'shahid',
                'slug' => 'شاهد',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ainews',
                'slug' => 'أخبار-الذكاء-الاصطناعي',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'diverse',
                'slug' => 'متنوع',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }

}
