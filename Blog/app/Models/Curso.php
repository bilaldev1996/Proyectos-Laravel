<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    //protected $fillable = ['name', 'description', 'category']; // campos que se pueden llenar de forma masiva

    protected $guarded = []; // campos que no se pueden llenar de forma masiva


    /**
     * La función `getRouteKeyName()` le dice a Laravel que use el campo `slug` en lugar del campo `id`
     * al generar URL
     * 
     * @return La columna slug de la base de datos.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
