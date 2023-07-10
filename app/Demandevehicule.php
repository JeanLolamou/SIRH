<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demandevehicule extends Model
{
    protected $fillable=['id_user','libelle', 'heur_debut','heur_fin','statut','date', 'annulation','responsable','commentaire','document','id_vehicule','supprimer'];


      public $timestamps = false;
}
