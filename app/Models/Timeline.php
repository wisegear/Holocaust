<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'timeline';

    protected $casts = [
        'event_date' => 'datetime:Y-m-d',
    ];
    
}

