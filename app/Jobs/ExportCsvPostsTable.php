<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportCsvPostsTable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     */
    public function handle(): BinaryFileResponse
    {
        $users = Post::all();
        $fileName = 'posts_table.csv';

        $handle = fopen($fileName, 'w+');
        fputcsv($handle, array('id', 'user_id', 'created_at', 'title', 'content', 'is_published'));

        foreach ($users as $row) {
            fputcsv($handle, array(
                $row['id'],
                $row['user_id'],
                $row['title'],
                $row['content'],
                $row['is_published'],
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-type' => 'text/csv',
        );

        return Response::download($fileName, $fileName, $headers);
    }
}
