<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Kabataan extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'age',
        'gender',
        'education_background',
        'work_status',
        'purok',
        'earlypregnancy',
        'mstatus',
        'ismalnourished',
        'birthdate',
        'isvoters',
        'ispwd',
        'youth_group',
        'contact'
    ];

    public function getFullnameAttribute(){

        return collect([$this->firstname,$this->middlename,$this->lastname])
        ->filter()
        ->join(' ');
    }


}
