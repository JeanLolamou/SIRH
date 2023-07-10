<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     protected $fillable=['details','id_user','type','etat'];


      public $timestamps = false;
}
