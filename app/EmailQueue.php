<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailQueue extends Model
{
    protected $table = 'email_queue';
    
    protected $fillable = ['post_id', 'email', 'sent'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
