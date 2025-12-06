<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','package_id','status','started_at','ends_at','payment_reference','notes'];

    protected $casts = [
        'started_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
