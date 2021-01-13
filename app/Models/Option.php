<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
       'title', 'face', 'insta','whats' ,'phone' , 'active' , 'email','created_at' , 'updated_at'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
