<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reload extends Model
{
    protected $guarded = [];

    public function drum()
    {
        return $this->belongsTo(Record::class);
    }
}
