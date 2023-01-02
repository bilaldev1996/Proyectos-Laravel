<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // habilitar asignacion masiva
    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    // Relacion uno a muchos
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
