<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data= [
            [
                'cate_name' => 'Đại dương',
                'cate_slug' => str_slug('Đại dương')
            ],

            [
                'cate_name' => 'Trên Cạn',
                'cate_slug' => str_slug('Trên Cạn')
            ],

            [
                'cate_name' => 'Minis',
                'cate_slug' => str_slug('Minis')
            ],

            [
                'cate_name' => 'XXL',
                'cate_slug' => str_slug('XXL')
            ],
        ];
        \DB::table('be_categories')->insert($data);
    }
}
