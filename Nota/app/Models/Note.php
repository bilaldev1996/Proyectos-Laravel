<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Casts\Attribute;

class Note extends Model
{
    use HasFactory; 

    protected function title(): Attribute{ 
        return new Attribute(
            get: fn($value) => ucwords($value), // Transforma las primeras letras de cada palabra en mayusculas al recuperar el valor : Accesor
            set: fn($value)=> strtolower($value) // Guarda la información en minusculas : Mutador
        ); 
    }
}