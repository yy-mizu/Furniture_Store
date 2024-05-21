<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                
                'name'=> 'AK47',
                'category_id'=> '1',
                'admin_id'=>'1',
                'code_id'=>'1',
                'supplier_id'=>'2',
                'description'=>'aaa',
                'price'=>'1200',
                'stock'=>'999',
                'uuid' =>'null',
                'created_at' => Carbon::now(),
                'product_code' =>'AK-47'
            ],

            [
                'name'=> 'M416',
                'category_id'=> '1',
                'admin_id'=>'1',
                'code_id'=>'1',
                'supplier_id'=>'2',
                'description'=>'aaa',
                'price'=>'1400',
                'stock'=>'999',
                'uuid' => '',
                'created_at' => Carbon::now(),
                'product_code' =>'M-4'
            ]

        ];
        $uuid = Str::uuid()->toString();
        DB::table('products')->insert($data);
    }
}
