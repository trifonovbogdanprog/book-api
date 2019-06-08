<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'owner_id',
        'name',
        'author',
        'present_year'
    ];
}
