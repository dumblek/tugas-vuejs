<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->hasOne('App\Item');
    }

}
