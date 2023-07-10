<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
     protected $fillable=['id_user','suggestion','supprimer','date'];


      public $timestamps = false;
}
