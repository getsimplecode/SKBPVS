<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Attended extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'kabataan_id',
        'status'
    ];

    public function event(){
        return $this->belongsTo(Event::class,'event_id');
    }

    public function kabataan(){
        return $this->belongsTo(Kabataan::class,'kabataan_id');
    }
    protected static function booted(): void
    {
        $clear = fn() => Cache::forget('dashboard.stats');

        static::created($clear);
        static::updated($clear);
        static::deleted($clear);
    }
}
