<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];

    public function measurement()
    {
        return $this->belongsTo('App\Measurement');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
