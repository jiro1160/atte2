<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'work_date', 'start_time', 'end_time'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
