<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToHomepageFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('homepage_features', function (Blueprint $table) {
            $table->date('feature_date')->after('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('homepage_features', function (Blueprint $table) {
            $table->dropColumn('feature_date');
        });
    }
}
