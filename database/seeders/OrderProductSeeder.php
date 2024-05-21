<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
             [
                'product_id' => '3',
                'order_id' => '11',
                'quantity' => '99',
                'price' => '1200',
                'created_at' => Carbon::now()


             ],
             [
                'product_id' => '3',
                'order_id' => '12',
                'quantity' => '99',
                'price' => '1200',
                'created_at' => Carbon::now()
             ],
             [
                'product_id' => '3',
                'order_id' => '13',
                'quantity' => '99',
                'price' => '1200',
                'created_at' => Carbon::now()
             ],
             [
                'product_id' => '2',
                'order_id' => '14',
                'quantity' => '99',
                'price' => '1400',
                'created_at' => Carbon::now()
             ],
             [
                'product_id' => '2',
                'order_id' => '15',
                'quantity' => '99',
                'price' => '1400',
                'created_at' => Carbon::now()
             ],

            ];

            DB::table('order_products')->insert($data);
    }
}
