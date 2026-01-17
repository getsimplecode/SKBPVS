<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodes extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kabataan_id',
        'image',
        'status'
    ];
    public function kabataan()
    {
        return $this->belongsTo(Kabataan::class, 'kabataan_id');
    }
}
