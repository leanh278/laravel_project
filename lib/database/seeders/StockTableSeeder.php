<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'stock_quantity'=>'10',
                'stock_prod'=>'5'
            ],
            [
                'stock_quantity'=>'20',
                'stock_prod'=>'7'
            ],
        ];
        \DB::table('stock')->insert($data);
    }
}
