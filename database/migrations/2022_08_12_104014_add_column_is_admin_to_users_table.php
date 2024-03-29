<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
//        if (config('database.default') !== 'mysql_users' or config('database.default') !== 'mysql_test') {
//            return;
//        }

        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false);
            //->after('column_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
//        if (config('database.default') !== 'mysql_users' or config('database.default') !== 'mysql_test') {
//            return;
//        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};
