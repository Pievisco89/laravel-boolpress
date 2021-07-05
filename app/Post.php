<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =[
        'title',
        'content',
        'slug',
        'category_id'
    ];

    //creo la relazione tra l'entità Post e l'entità Category
    public function category(){
        
        return $this->belongsTo('App\Category');

    }
}
