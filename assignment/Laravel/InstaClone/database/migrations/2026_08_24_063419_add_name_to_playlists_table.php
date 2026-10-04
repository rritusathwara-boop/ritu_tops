<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    //session-10 Task-1
    {
        Schema::table('playlists', function (Blueprint $table) {
            $table->string('name');
        });
    }

    public function down()
    {
        Schema::table('playlists', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
};