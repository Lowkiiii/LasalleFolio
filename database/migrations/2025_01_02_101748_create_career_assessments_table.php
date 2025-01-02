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
        Schema::create('career_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->float('data_engineering_score');
            $table->float('data_science_score');
            $table->float('ai_engineering_score');
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('career_assessments', function (Blueprint $table) {
            $table->dropForeign('career_assessments_user_id_foreign');
        });
        Schema::dropIfExists('career_assessments');
    }
};
