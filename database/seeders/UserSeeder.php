<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            ['id' => 1, 'first_name' => 'admin', 'email' => 'admin', 'password' => Hash::make('admin123'), 'birthdate' => now(),'user_type_id' => 1, 'sex' => 'male']
        ]);
    }
}
