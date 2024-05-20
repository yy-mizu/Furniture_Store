<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'customer_id' => '1',
                'payment_method' => 'COD',
                'buyer_name' => 'Mg Mg',
                'buyer_phone' => '09788892615',
                'buyer_email' => 'test@gmail.com',
                'delivery_address' => 'Yangon',
                'total_price' => '12000',
                'status' => '0'

    
            ],
    
            [
                'customer_id' => '1',
                'payment_method' => 'COD',
                'buyer_name' => 'Mg Mg',
                'buyer_phone' => '09788892615',
                'buyer_email' => 'test@gmail.com',
                'delivery_address' => 'Yangon',
                'total_price' => '15000',
                'status' => '0'
    
            ],
    
            [
                'customer_id' => '1',
                'payment_method' => 'COD',
                'buyer_name' => 'Mg Mg',
                'buyer_phone' => '09788892615',
                'buyer_email' => 'test@gmail.com',
                'delivery_address' => 'Yangon',
                'total_price' => '18000',
                'status' => '1'
            ],
    
            [
                'customer_id' => '1',
                'payment_method' => 'COD',
                'buyer_name' => 'Mg Mg',
                'buyer_phone' => '09788892615',
                'buyer_email' => 'test@gmail.com',
                'delivery_address' => 'Yangon',
                'total_price' => '11000',
                'status' => '2'
            ],
    
            [
                'customer_id' => '1',
                'payment_method' => 'COD',
                'buyer_name' => 'Mg Mg',
                'buyer_phone' => '09788892615',
                'buyer_email' => 'test@gmail.com',
                'delivery_address' => 'Yangon',
                'total_price' => '12000',
                'status' => '0'
            ],
    
        ];

        DB::table('orders')->insert($data);
    }
}
