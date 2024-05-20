<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
        [
            [
                'name' => 'Mg Mg',
                'email' => 'test@gmail.com',
                'phone' => '09788892615',
                'address' => 'Yangon',
                'joining_date' => Carbon::now(),
                'password' => '1111',
                'image'=> '-',
                'uuid' => '-',
                'status' => 'Active'

            ]

        
        ];

        DB::table('customers')->insert($data);
    }
}
