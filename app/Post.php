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

    protected $fillable = array('name', 'description', 'cover_image', 'password');
    // 10:56 added password as fillable since it was added to the DB
    
    public function user(){
        return $this->belongsTo('App\User');
    }


    public function photos(){
        return $this->hasMany('App\Photo');
    }

    // Solution to the parameter array issue 
    public function posts(){
        return $this->hasMany('App\Post');
    }
    
    //11:02 Added relationship between POST and PASSWORD
    //Post belongs to Password
    //  public function password(){
    //     return $this->belongsto('App\PostPassword');
    // }

}
