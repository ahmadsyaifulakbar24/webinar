<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';
    protected $fillable = [
        'user_id',
        'training_id',
        'role_id',
        'qrcode',
        'certificate'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }

    public function role()
    {
        return $this->belongsTo(Param::class, 'role_id');
    }
}
