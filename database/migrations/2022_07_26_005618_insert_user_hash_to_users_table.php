<?php

use Illuminate\Database\Migrations\Migration;
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
        $query = <<<SQL
            UPDATE users
            SET user_hash = MD5(CONCAT(
                name, '$',
                email, '$',
                password
            ))
SQL;

        DB::update($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::statement('UPDATE users SET user_hash = ""');
    }
};
