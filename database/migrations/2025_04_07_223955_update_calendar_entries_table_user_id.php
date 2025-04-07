<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCalendarEntriesTableUserId extends Migration
{
    public function up()
    {
        // Usuń klucz obcy jeśli istnieje
        Schema::table('calendar_entries', function (Blueprint $table) {
            if (Schema::hasColumn('calendar_entries', 'user_id')) {
                $table->dropForeign(['user_id']);
            }
        });

        // Zmień typ kolumny
        Schema::table('calendar_entries', function (Blueprint $table) {
            $table->integer('user_id')->change();
        });
    }

    public function down()
    {
        // Przywróć poprzedni typ kolumny (opcjonalnie)
        Schema::table('calendar_entries', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
        });
    }
}