<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rests extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'rest_start',
        'rest_end',
        'rest_time',
        'stamp_date',
    ];

    protected $casts = [
        'rest_time' => 'time'
    ];
}
