<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable=['id_user','type','libelle','id_conge','id_demande_doc','details','confidentialite'];


      public $timestamps = false;
}
