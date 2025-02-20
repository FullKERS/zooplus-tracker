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
        Schema::table('subcampaigns', function (Blueprint $table) {
            Schema::table('subcampaigns', function (Blueprint $table) {
                // Dodajemy country_id jako unsignedBigInteger
                $table->unsignedInteger('country_id')->nullable();
        
                // Dodajemy klucz obcy
                $table->foreign('country_id')
                      ->references('id')
                      ->on('countries')
                      ->onDelete('set null');
            });
        });
    }

    public function down()
    {
        Schema::table('subcampaigns', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropColumn('country_id');
        });
    }
};
