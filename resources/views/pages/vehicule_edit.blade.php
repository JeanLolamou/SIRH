@extends('templates/default')
         @section('contenu')

         

 <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-edit"></i> Modification</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-building-o"></i><a href="{{route('demande_salle')}}">Réservation de vehicule</a></li>   
            <li><i class="fa fa-edit"></i>Modification</li>              
          </ol>
        </div>
      </div>

@foreach ($demandevehicule as $demandevehicule)

<div class="row">
        

      <div class="row profile">
        
        <div class="col-md-4">
          
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="text-center">
                <img class="img-profile" src="{{ asset('images/profil/'.photo($demandevehicule->id_user).'')}}" style="max-height: 100px;max-width: 100px;">
              </div>
              
              <h3 class="text-center"><strong>{{nom_user($demandevehicule->id_user)}}</strong></h3>
             
              
              <hr>
              
                
              
              
              
            </div>  
            
          </div>
        
        </div><!--/.col-->
        
        <div class="col-md-8">
        
                    <div class="panel panel-default">                               
                        <div class="panel-heading">
                            <h2><i class="fa fa-edit red"></i><strong>Modification</strong></h2>
                        </div>
                        <div class="panel-body">
                           <form action="{{ route ('Demandevehicule.update', $demandevehicule->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="modif" value="1">

                               <div class="form-group">
                             <label for="direction-w1">Sujet</label>
                          <input name="libelle" type="text" class="form-control" id="daterange" value="{{$demandevehicule->libelle}}">
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                          <div class="form-group">
                  <label class="control-label" for="daterange">Date</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input name="date" type="date" class="form-control" id="daterange" value="{{$demandevehicule->date}}">
                  </div>
                  </div>
                </div>
                        </div>
                          <div class="col-md-4">
                          <div class="form-group">
                  <label class="control-label" for="daterange">Heure debut</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input name="heur_debut" type="time" class="form-control" id="daterange" value="{{$demandevehicule->heur_debut}}">
                  </div>
                  </div>
                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                  <label class="control-label" for="daterange">Heure Fin</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input name="heur_fin" type="time" class="form-control" id="daterange" value="{{$demandevehicule->heur_fin}}">
                  </div>
                  </div>
                </div>
                        </div>
                         
                        </div>

                       

                              

                <div class="form-group">
                  <label class="control-label" for="textarea2">Commentaire</label>
                  <div class="controls">
                  <textarea name="commentaire"  id="limit" class="form-control" rows="6" style="width:100%">
                    {{$demandevehicule->commentaire}}
                  </textarea>
                  </div>
                </div>
                              
                              
                       
                              <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>          
                                
                                        
                            </form>
                        </div>
                    </div>
          
        </div><!--/.col-->
      
      </div><!--/.row profile-->  


   

      @endforeach
         @stop