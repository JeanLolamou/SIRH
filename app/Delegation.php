<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegation extends Model
{
     protected $fillable=['id_delegant','id_delegue','date','id_menu','supprimer'];


      public $timestamps = false;
}
