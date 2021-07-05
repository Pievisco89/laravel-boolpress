<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //creo la relazione tra l'entità Category e l'entità Post
    public function posts(){
        
        return $this->hasMany('App\Post');

    }

}
