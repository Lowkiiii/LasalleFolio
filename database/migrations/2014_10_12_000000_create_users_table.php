<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_user_types', function (Blueprint $table) {
            $table->id();
            $table->string('user_type');
        });

        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->date('birthdate')->nullable();
            $table->string('full_address')->nullable();
            $table->unsignedBigInteger('user_type_id')->default(2);
            $table->string('sex');
            $table->string('public_url')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_type_id')->references('id')->on('tbl_user_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_user_type_id_foreign');
        });
    

        Schema::dropIfExists('users');
        Schema::dropIfExists('tbl_user_types');
    }
};
