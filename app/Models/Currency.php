<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    // php artisan tinker
    // new Currency
    // $currency = Currency::first()
    // $currency
    // $currency->toArray()
    // $currency->toJson()
    // (string) $currency
    // $currency->id
    // $currency->name
//    protected $table = 'another_table_name';
//    protected $primaryKey = 'another_then_id_field';
    public $incrementing = false;

    protected $fillable = [
      'name',
      'price',
      'is_active',
      'sort',
    ];

//    protected $guarded = [
//      ''
//    ];

//    protected $hidden = [
//
//    ];

    protected $casts = [
        'price' => 'float',
        'is_active' => 'boolean',
        'sort' => 'integer',
//        'secret' => 'encrypted',
    ];

    protected $dates = [
          'active_at',
    ];
}
