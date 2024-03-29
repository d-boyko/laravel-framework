<?php

namespace App\Actions;

use App\Models\Post;

class CreatePostAction
{
    public function handle(): Post
    {
        return Post::create([
            'user_id' => 100,
            'title' => 'Test creating title',
            'content' => 'Test creating content'
        ]);
    }
}
