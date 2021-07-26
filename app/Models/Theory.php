<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theory extends Model
{
    protected $table = 'theories';
    protected $fillable = [
        'training_id',
        'theory',
    ];

    public $timestamps = false;
}
