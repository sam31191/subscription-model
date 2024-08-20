<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = ['email', 'website_id'];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}

