<?php

namespace App\Observers;

use App\Events\UnknownPostUserIdEvent;
use App\Models\Post;
use App\Models\User;

class PostObserver
{
    public function creating(Post $post): bool
    {
        if (!User::find($post->user_id)) {
            $text = 'Unable to create new post without current user_id';
            event(new UnknownPostUserIdEvent($post->user_id, $text));
            return false;
        }

        return true;
    }

    /**
     * Handle the Post "created" event.
     *
     * @param Post $post
     * @return void
     */
    public function created(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param Post $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param Post $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param Post $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
