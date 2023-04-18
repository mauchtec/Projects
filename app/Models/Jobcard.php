<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobcard extends Model
{
    use HasFactory;
    protected $fillable = [
        'tachname',
        'clientname',
        'clientemail',
        'clientnumber',
        'sitename',
        'signature',
        'description',
        'starttime',
        'endtime',
        'user_id',

    ];
}

