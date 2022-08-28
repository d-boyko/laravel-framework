<?php

namespace App\Console\Commands;

use App\Actions\ExportDatabaseTables;
use Illuminate\Console\Command;

class ExportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export all data or some table from database';

    /**
     * Execute the console command.
     * @param ExportDatabaseTables $action
     */
    public function handle(ExportDatabaseTables $action)
    {
        $action->handle();
    }
}
