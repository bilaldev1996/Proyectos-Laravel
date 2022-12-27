<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // relacion uno a muchos (inversa)
    // recupera el usuario que creo el post
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // relacion uno a muchos (inversa)
    // recupera la categoria del post
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    // relacion uno a uno polimorfica
    // recupera la imagen del post
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    // relacion uno a muchos polimorfica
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable'); 
    }

    // relacion muchos a muchos polimorfica
    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
