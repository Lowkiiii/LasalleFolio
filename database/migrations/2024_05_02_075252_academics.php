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
        //
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('education_insitution');
            $table->string('course');
            $table->string('major');
            $table->date('date_started');
            $table->date('date_ended');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academics', function (Blueprint $table) {
            $table->dropForeign('academics_user_id_foreign');
        });

        //
        Schema::dropIfExists('academics');
    }
};
