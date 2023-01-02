<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function getRouteKeyName(){
        return 'slug';
    }

    // Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relacion uno a muchos inversa
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    // Relacion muchos a muchos
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    // Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
