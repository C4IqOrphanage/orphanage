<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orphans extends Model
{
    //
    protected $fillable = [
        'image', 'name', 'age', 'description'
    ];
}
