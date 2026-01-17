<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
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
        return $this->belongsTo(kabataan::class,'kabataan_id');
    }
}
