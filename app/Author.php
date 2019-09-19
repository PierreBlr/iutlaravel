<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{   

    protected $fillable = ['prenom', 'nom'];

    function books(){
        return $this->hasMany('App\Book');
    }
}
