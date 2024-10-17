<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id(); // Primary key 'id'
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->timestamps();
            $table->unique(['user_id', 'post_id']); 

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('reactions', function (Blueprint $table) {
            $table->dropForeign('reactions_user_id_foreign');
            
        });

        Schema::table('reactions', function (Blueprint $table) {
            $table->dropForeign('reactions_post_id_foreign');
        });
        
        Schema::dropIfExists('reactions');
    }
};