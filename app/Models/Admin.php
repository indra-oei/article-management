<?php

namespace App\Models;

use App\Observers\LogObserver;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::observe(LogObserver::class);
    }
    
    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password'
    ];
}