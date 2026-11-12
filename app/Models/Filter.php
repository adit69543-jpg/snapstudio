<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'css_filter',
        'status',
    ];
}
