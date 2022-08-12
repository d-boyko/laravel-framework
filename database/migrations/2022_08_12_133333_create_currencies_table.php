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
        Schema::create('currencies', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->timestamps();

            $table->string('name');
            $table->decimal('price')->unsigned();
            $table->boolean('is_active')->default(true)->comment('Active or non-active in app');
            $table->timestamp('active_at')->nullable();
            $table->integer('sort')->unsigned()->comment('For sorting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
};
