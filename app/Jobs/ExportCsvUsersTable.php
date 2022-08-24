<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportCsvUsersTable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     */
    public function handle(): BinaryFileResponse
    {
        $users = User::all();
        $fileName = 'users_table.csv';

        $handle = fopen($fileName, 'w+');
        fputcsv($handle, array(
            'id',
            'created_at',
            'name',
            'password',
            'email',
            'is_active',
            'is_admin'
        ));

        foreach ($users as $row) {
            fputcsv($handle, array(
                $row['id'],
                $row['created_at'],
                $row['name'],
                $row['password'],
                $row['email'],
                $row['is_active'],
                $row['is_admin']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-type' => 'text/csv',
        );

        return Response::download($fileName, $fileName, $headers);
    }
}
