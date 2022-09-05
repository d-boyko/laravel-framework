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

        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_liked');
            $table->integer('likeable_id');
            $table->string('likeable_type');
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

        Schema::dropIfExists('likes');
    }
};
