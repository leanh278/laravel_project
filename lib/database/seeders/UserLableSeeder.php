<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserLableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        //
        $data = [
            [
                'email'=>'email@gmail.com',
                'name'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'email'=>'admin@gmail.com',
                'name'=>'abc',
                'password'=>bcrypt('123456')
            ],
        ];
        \DB::table('vp_users')->insert($data);
    }
}
