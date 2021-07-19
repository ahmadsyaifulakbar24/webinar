<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Training extends Model
{
    protected $table = 'trainings';
    protected $fillable = [
        'unit_id',
        'sub_unit_id',
        'poster_path',
        'topic',
        'date',
        'time',
        'description',
        'ttd_id',
        'status',
        'code',
    ];

    protected $appends = [
        'poster_url',
    ];

    public function getPosterUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['poster_path']);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('Y-m-d');
    }   

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('Y-m-d');
    }  

    public function unit()
    {
        return $this->belongsTo(Param::class, 'unit_id');
    }

    public function sub_unit()
    {
        return $this->belongsTo(Param::class, 'sub_unit_id');
    }

    public function theory()
    {
        return $this->hasMany(Theory::class, 'training_id');
    }

    public function registration()
    {
        return $this->hasMany(Registration::class, 'training_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'registrations', 'training_id', 'user_id');
    }

    public function  ttd()
    {
        return $this->belongsTo(Ttd::class, 'ttd_id');
    }
}
