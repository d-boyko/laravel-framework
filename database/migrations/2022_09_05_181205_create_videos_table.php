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
        if (config('database.default') !== 'mysql_morph') {
            return;
        }

        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (config('database.default') !== 'mysql_morph') {
            return;
        }

        Schema::dropIfExists('videos');
    }
};
