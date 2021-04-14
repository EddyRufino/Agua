<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model  // drum
{
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
