<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ttd extends Model
{
    protected $table = 'ttds';
    protected $fillable = [
        'name',
        'unit',
        'ttd_path'
    ];

    public $timestamsp = false;

    public $appends = [
        'ttd_url'
    ];

    public function getTtdUrlAttribute()
    {
        return asset('') . $this->attributes['ttd_path'];
    }
}
