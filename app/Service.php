<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=['nom','responsable','id_direction','description','supprimer'];


      public $timestamps = false;
}
