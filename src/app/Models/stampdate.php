<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stampdate extends Model
{
    use HasFactory;
    protected $fillable = [
        'stamp_date',
    ];
}
