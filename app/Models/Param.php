<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    protected $table = 'params';
    protected $fillable = [
        'parent_id',
        'category',
        'param',
        'order',
    ];

    public $timestamps = false;
}
