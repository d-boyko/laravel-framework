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
    public function up()
    {
        if (config('database.default') !== 'mysql_users') {
            return;
        }

        Schema::create('versions', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->date('release_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (config('database.default') !== 'mysql_users') {
            return;
        }

        Schema::dropIfExists('versions');
    }
};
