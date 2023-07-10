<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
     protected $fillable=['id_user','nbrjours','type','libelle', 'date_debut','date_fin','statut','date', 'annulation','responsable','commentaire','reponse','document','supprimer'];


      public $timestamps = false;
}
