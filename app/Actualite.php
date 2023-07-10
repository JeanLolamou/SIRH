<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    protected $fillable=['titre','contenu','image','date_publier','supprimer'];


      public $timestamps = false;
}
