<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('career_assessments', function (Blueprint $table) {
            // Rename existing columns
            $table->renameColumn('data_engineering_score', 'junior_programmer_score');
            $table->renameColumn('data_science_score', 'junior_technical_artist_score');
            $table->renameColumn('ai_engineering_score', 'junior_game_designer_score');
            
            // Add new columns
            $table->float('ui_ux_designer_score')->default(0);
            $table->float('qa_tester_score')->default(0);
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
