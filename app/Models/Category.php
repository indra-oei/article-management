<?php

namespace App\Models;

use App\Observers\LogObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::observe(LogObserver::class);
    }
    
    protected $fillable = [
        'name',
    ];
}
