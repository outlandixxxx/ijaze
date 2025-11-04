<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
           
            [
                'name' => 'famous',
                'slug' => 'مشهور',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'life',
                'slug' => 'حياة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'moroccan',
                'slug' => 'مغربي',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'health',
                'slug' => 'صحة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'politic',
                'slug' => 'سياسة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'economy',
                'slug' => 'اقتصاد',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'society',
                'slug' => 'مجتمع',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'cultureart',
                'slug' => 'ثقافة-وفن',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'technology',
                'slug' => 'تكنولوجيا',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'motadawal',
                'slug' => 'متداول',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'social first',
                'slug' => 'الأول-اجتماعيا',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'news caption',
                'slug' => 'عناوين-الأخبار',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('sub_categories')->insert($subcategories);
    }
}
