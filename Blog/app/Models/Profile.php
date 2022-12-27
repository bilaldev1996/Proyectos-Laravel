<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    /**
     * > La función `user()` devuelve el usuario propietario de la publicación
     * 
     * @return Una colección de todos los comentarios que pertenecen al usuario.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
