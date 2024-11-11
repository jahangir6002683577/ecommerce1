<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'name' => 'Admin',
                'mobile' => '01761347520',
                'password' => '1111',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'name' => 'Manager',
                'mobile' => 'manager@gmail.com',
                'password' => 'password',
                'role' => 'vendor',
                'created_at' => now(),
                'updated_at' => now(),

            ]
        );

        DB::table('users')->insert($data);
    }
}
