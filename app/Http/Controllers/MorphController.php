<?php

namespace App\Http\Controllers;

use App\Models\Like;
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
}
