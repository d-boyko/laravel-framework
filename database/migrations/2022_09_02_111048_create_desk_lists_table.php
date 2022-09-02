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
        if (config('database.default') !== 'mysql_trello') {
            return;
        }

        Schema::create('desk_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('desk_id');
            $table->foreign('desk_id')->references('id')->on('desks')->cascadeOnDelete();
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
        if (config('database.default') !== 'mysql_trello') {
            return;
        }

        Schema::dropIfExists('desk_lists');
    }
};
