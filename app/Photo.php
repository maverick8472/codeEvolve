<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $uploads_path = '/images/';

    protected $fillable = ['file','user_id'];

    public function getFileAttribute($photo){

        return $this->uploads_path . $photo;


    }

    public function user(){

        return $this->belongsTo('App\User');
    }
}
