<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    // Primary Key
    protected $primarykey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = array('name', 'description', 'cover_image');
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    

    public function photos(){
        return $this->hasMany('App\Photo');
    }
}