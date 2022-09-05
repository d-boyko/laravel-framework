<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\SocialPost;
use App\Models\Video;
use JetBrains\PhpStorm\NoReturn;

class MorphController extends Controller
{
    #[NoReturn] public function getVideo()
    {
        $video = Video::find(7);
        $like = $video->like;
        dd($like);
    }

    #[NoReturn] public function getParentLikeObject()
    {
        $like = Like::find(1);
        $likeable = $like->likeable;

        dd($likeable);
    }

    #[NoReturn] public function getVideosWithComments()
    {
        $video = Video::find(55);

        foreach ($video->comments as $item) {
            echo $item->text;
        }

        dd($video->comments);
    }

    #[NoReturn] public function getParentMorphManyObject()
    {
        $comment = Comment::find(1);
        $commentable = $comment->commentable;

        dd($commentable);
    }

    #[NoReturn] public function getTagsBySocialPost()
    {
        $socialPost = SocialPost::find(66);
        $taggablePost = $socialPost->tags;

        $video = Video::find(66);
        $taggableVideo = $video->tags;

        dd($taggablePost, $taggableVideo);
    }
}
