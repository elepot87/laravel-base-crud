<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumb',
        'series',
        'price', 
        'sale_date', 
        'type',
        'artists', 
        'writers',
    ];
}