<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typesalle extends Model
{
    protected $fillable=['nom','supprimer'];


      public $timestamps = false;
}
