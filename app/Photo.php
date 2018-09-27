<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = array('post_id', 'description', 'photo', 'title', 'size');

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
