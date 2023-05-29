<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'from_place',
        'to_place',
        'reason',
        'transaction_type',
        'kms',
        'reciept',
        'amount',

    ];
}
