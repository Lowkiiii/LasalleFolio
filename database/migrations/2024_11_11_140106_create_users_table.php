<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insert data directly into the users table
        DB::table('users')->insert([
            [
                'first_name' => 'Robin',
                'last_name' => 'Seliwan',
                'email' => 'rob@gmail.com',
                'image' => '',
                'password' => bcrypt('123123123'),
                'birthdate' => '2001-12-04',
                'full_address' => 'Sandoval St. Silay City Negross Occidental',
                'user_type_id' => 2,
                'sex' => 'Male',
                'public_url' => null,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more user data here...
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
