<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $fillable = ['name'];

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

