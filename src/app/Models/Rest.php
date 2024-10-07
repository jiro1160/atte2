<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = [
        'works_id', 'start_time', 'end_time'
    ];

    public function work()
    {
        return $this->belongsTo(Work::class, 'works_id');
    }
}
