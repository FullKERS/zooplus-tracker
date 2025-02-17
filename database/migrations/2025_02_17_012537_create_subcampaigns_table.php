<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubcampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcampaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('subcampaign_name')->nullable();
            $table->string('order_number')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('status')->nullable();
            $table->integer('campaign_id');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subcampaigns');
    }
}
