<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartitionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data= [
            [
                'par_name' => 'Admin',
                
            ],

            [
                'par_name' => 'User',
                
            ],
   
        ];
        \DB::table('be_partition')->insert($data);
    }
}
