<?php

// DONE
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::insert('insert into users (id, name, email, email_verified_at, password) VALUES (?, ?, ?, ?, ?)',
        [1, 'John', 'john@gmail.com', NULL, '123123123']);
    }

    public function down()
    {
        DB::delete('delete from users where name = ?', ['John']);
    }
};
