<?php

namespace App\Actions;

use App\Models\Post;

class CreatePostAction
{
    public function handle(): void
    {
        Post::create([
            'user_id' => 100000,
            'title' => 'Test creating title',
            'content' => 'Test creating content'
        ]);
    }
}
