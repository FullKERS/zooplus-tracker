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
        Schema::create('subcampaign_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('subcampaign_id'); // MUSI BYĆ dokładnie ten sam typ co 'id' w subcampaigns
            $table->unsignedInteger('status_id');
            $table->timestamp('status_date')->nullable();
            $table->boolean('is_visible')->default(false);
            $table->boolean('is_assigned')->default(false);
            $table->timestamps();

            // Klucze obce
            $table->foreign('subcampaign_id')->references('id')->on('subcampaigns')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcampaign_statuses');
    }
};
