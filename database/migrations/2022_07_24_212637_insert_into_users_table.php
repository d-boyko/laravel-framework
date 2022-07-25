<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::insert('insert into users (id, name, email, email_verified_at, password) VALUES (?, ?, ?, ?, ?)',
            [2, 'Carlie', 'carlie@gmail.com', NULL, 'irt92k']);
        DB::insert('insert into users (id, name, email, email_verified_at, password) VALUES (?, ?, ?, ?, ?)',
            [3, 'Rick', 'rick@gmail.com', NULL, '0oidkb']);
        DB::insert('insert into users (id, name, email, email_verified_at, password) VALUES (?, ?, ?, ?, ?)',
            [4, 'Vanheim', 'vanheim@gmail.com', NULL, 'vanheiem123']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::delete('delete from users where id = ?', [2]);
        DB::delete('delete from users where id = ?', [3]);
        DB::delete('delete from users where id = ?', [4]);
    }
};
