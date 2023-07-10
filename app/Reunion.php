<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    protected $fillable=['id_user','libelle', 'heur_debut','heur_fin','statut','date', 'annulation','responsable','commentaire','document','id_salle','supprimer'];


      public $timestamps = false;
}
