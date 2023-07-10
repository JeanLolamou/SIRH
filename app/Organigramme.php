<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organigramme extends Model
{
    protected $fillable=['image','date'];


      public $timestamps = false;
}
