<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['name', 'tags', 'description', 'isHighlight', 'created_at', 'updated_at'];
    protected $casts = [
        'tags' => 'array', // automatically casts JSON to array and vice versa
    ];
}
