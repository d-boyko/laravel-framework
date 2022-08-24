<?php

namespace App\Actions;

use App\Jobs\ExportCsvPostsTable;
use App\Jobs\ExportCsvUsersTable;

class ExportDatabaseTables
{
    public function handle(): void
    {
        ExportCsvUsersTable::dispatch();
        ExportCsvPostsTable::dispatch();
    }
}
