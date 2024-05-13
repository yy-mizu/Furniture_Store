<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => "Admin",
                'status' => 'Active',
            ],

            [
                'name' => "Staff",
                'status' => 'Active',
            ],

            [
                'name' => "OJT",
                'status' => 'Active',
            ],

        ];
        DB::table('roles')->insert($data);
    }
}
