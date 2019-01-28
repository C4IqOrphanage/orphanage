<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adopted extends Model
{
     protected $table = "adopted";

     protected $fillable = [
        'user_id', 'orphan_id',
     ];

    public function user()
    {
        return $this->belongTo('App\User', 'id');
    }

    public function orphan()
    {
        return $this->belongTo('App\Orphans', 'id');
    }
}
