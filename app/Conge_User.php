<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
     protected $fillable=['id_user','nbr_jours','type','libelle', 'date_debut','date_fin','statut','date', 'annulation','responsable','commentaire'];


      public $timestamps = false;
}
