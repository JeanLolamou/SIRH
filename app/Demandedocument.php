<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demandedocument extends Model
{
    protected $fillable=['id_user','type_demande','sujet','description','date','statut','reponse','supprimer','document1','document2','document3','document4','document5','document_user'];


      public $timestamps = false;
}
