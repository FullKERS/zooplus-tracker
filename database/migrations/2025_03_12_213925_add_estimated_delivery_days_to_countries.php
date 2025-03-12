<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstimatedDeliveryDaysToCountries extends Migration
{
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->integer('estimated_delivery_days')->default(2)->after('flag_image');
        });
    }

    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('estimated_delivery_days');
        });
    }
}