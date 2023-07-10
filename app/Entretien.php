<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    protected $fillable=['id_user','libelle','date','description','reponse','supprimer','statut','heur','id_responsable'];


      public $timestamps = false;
}
