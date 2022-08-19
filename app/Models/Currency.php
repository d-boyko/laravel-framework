<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
      'name',
      'price',
      'is_active',
      'sort',
    ];

    protected $casts = [
        'price' => 'float',
        'is_active' => 'boolean',
        'sort' => 'integer',
    ];

    protected $dates = [
          'active_at',
    ];
}
