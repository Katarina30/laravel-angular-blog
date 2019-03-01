<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id',
    ];
    protected $table = 'posts';
   

     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
