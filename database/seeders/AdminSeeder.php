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
        $uuid = Str::uuid()->toString();
        DB::table('admins')->insert([
            'name' => "super",
            'email' => 'super@gmail.com',
            'address' => 'Yangon',
            'age' => 33,
            'phone' => '09788892615',
            'role_id' => '1',
            'password' => bcrypt('1111'),
            'uuid' => $uuid,
            'image' => '-',
            'status' => 'Active',
            




        ]);
    }
}
