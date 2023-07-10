<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $fillable=['nom','directeur','description','supprimer'];


      public $timestamps = false;
}
