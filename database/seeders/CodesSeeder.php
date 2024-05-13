<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodesSeeder extends Seeder
{
    
   
    public function run(): void

    
    {

        $data = [
            [
                'name' => "BD -",
    
            ],
    
            [
                'name' => "LMP -",
    
            ],
    
            [
                'name' => "CH -",
            ],
    
            [
                'name' => "SOF -",
            ],
    
            [
                'name' => "CAB -",
            ],
    
        ];
        DB::table('codes')->insert($data);
    }
}
