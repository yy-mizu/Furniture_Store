<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    
    {

        $data = [
            [
                'name' => "Bed ",
    
            ],
    
            [
                'name' => "Lamp ",
    
            ],
    
            [
                'name' => "Chair ",
            ],
    
            [
                'name' => "Sofa ",
            ],
    
            [
                'name' => "Cabinet ",
            ],

            [
                'name' => "Office ",
            ],

            [
                'name' => "Kitchen ",
            ],
    
        ];
        DB::table('categories')->insert($data);
    }
}
