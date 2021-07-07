<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'nik',
        'date_of_birth',
        'gender',
        'agency',
        'position',
        'address',
        'province_id',
        'city_id',
        'phone_number',
        'photo',
        'user_role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'photo_url'
    ];

    public function getPhotoUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['photo']);
    }

    public function training()
    {
        return $this->belongsToMany(Training::class, 'user_id', 'training_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function user_role()
    {
        return $this->belongsTo(UserRole::class, 'user_role_id');
    }
}
