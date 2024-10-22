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
        Schema::create('tbl_quiz_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('points');
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    public function down(): void
    {
        Schema::table('tbl_quiz_points', function (Blueprint $table) {
            $table->dropForeign('tbl_quiz_points_user_id_foreign');
        });
        Schema::dropIfExists('tbl_quiz_points');
    }
};
