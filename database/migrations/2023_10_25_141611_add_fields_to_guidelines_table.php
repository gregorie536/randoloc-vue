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
        Schema::table('guidelines', function (Blueprint $table) {
            $table->string('type')->nullable();
            $table->string('season_year')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('guidelines', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('season_year');
        });
    }
};
