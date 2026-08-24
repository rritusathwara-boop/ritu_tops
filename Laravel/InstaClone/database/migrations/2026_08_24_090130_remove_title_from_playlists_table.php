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
        //sesion-11 Task-5
        Schema::table('playlists', function (Blueprint $table) {
        $table->dropColumn('title');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        //sesion-11 Task-5
        Schema::table('playlists', function (Blueprint $table) {
        $table->string('title');
    });
    }
};
