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
        DB::insert('insert into orders (id, user_id, message, cost) VALUES (?, ?, ?, ?)',
        [1, 1, 'Two apples and some bananas', 3000]);

        DB::insert('insert into orders (id, user_id, message, cost) VALUES (?, ?, ?, ?)',
        [2, 1, 'Three bottles', 500]);

        DB::insert('insert into orders (id, user_id, message, cost) VALUES (?, ?, ?, ?)',
        [3, 2, 'Paintball video game', 1799]);

        DB::insert('insert into orders (id, user_id, message, cost) VALUES (?, ?, ?, ?)',
        [4, 3, 'Mac mini', 119000]);

        DB::insert('insert into orders (id, user_id, message, cost) VALUES (?, ?, ?, ?)',
        [5, 3, 'IPhone', 79000]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::delete('delete from orders where id = ?', [1]);
        DB::delete('delete from orders where id = ?', [2]);
        DB::delete('delete from orders where id = ?', [3]);
        DB::delete('delete from orders where id = ?', [4]);
        DB::delete('delete from orders where id = ?', [5]);
    }
};
