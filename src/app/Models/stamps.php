<?php

namespace App\Models;

use CreateUsersTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stamps extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'start_work',
        'end_work',
        'total_work',
        'total_rest',
        'stamp_date',
    ];
    protected $casts = [
        'start_work' => 'datetime',
        'end_work' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
