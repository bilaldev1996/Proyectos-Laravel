<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // realcion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    // relación polimórfica
    public function commentable()
    {
        return $this->morphTo(); 
    }
}
