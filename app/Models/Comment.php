<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'commentable_type',
        'commentable_id',
    ];

    public function like(): MorphOne
    {
        return $this->morphOne(Like::class, 'likeable');
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
