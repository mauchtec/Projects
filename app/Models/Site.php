<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $fillable = [
       'sitename',
       'platform',
       'group',
       'contactperson',
       'email',
       'sitenumber',
       'coodinates',
       'siteaddress',
       'notes',
       'link',
       'user_id',
       
    ];
}
