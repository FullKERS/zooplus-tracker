<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('local_users', function (Blueprint $table) {
            $table->string('login')->unique()->after('id');
            $table->string('fullName')->nullable()->after('login');
            $table->string('language', 16)->nullable()->after('email');
            $table->string('theme', 32)->nullable()->after('language');
            $table->string('role', 32)->default('user')->after('theme');
            $table->boolean('hidden')->default(false)->after('role');
            $table->timestamp('pwdExpiration')->nullable()->after('hidden');
            $table->boolean('disabled')->default(false)->after('pwdExpiration');

            // opcjonalnie: usuń stare pole 'name'
            $table->dropColumn('name');
            $table->dropColumn('is_admin');
        });
    }

    public function down(): void
    {
        Schema::table('local_users', function (Blueprint $table) {
            $table->dropColumn([
                'login', 'fullName', 'language', 'theme', 'role',
                'hidden', 'pwdExpiration', 'disabled'
            ]);

            // Przywróć stare pola
            $table->string('name');
            $table->boolean('is_admin')->default(false);
        });
    }
};