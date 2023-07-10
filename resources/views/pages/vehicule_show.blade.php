@extends('templates/default')
         @section('contenu')

        

 <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-file"></i> Details</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-building-o"></i><a href="{{route('demande_salle')}}">Réservation de vehicule</a></li>   
            <li><i class="fa fa-file"></i>Détails</li>              
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
                            <h2><i class="fa fa-file-o red"></i><strong>Détails</strong></h2>
                        </div>
                        <div class="panel-body">
                          

                         <div class="form-group">
                            
                          
                        </div>

                           <div class="form-group">
                             <label for="direction-w1">Sujet</label>
                          <input disabled type="text" class="form-control" id="daterange" value="{{$demandevehicule->libelle}}">
                        </div>

                        <div class="row">
                           <div class="col-md-4">
                          <div class="form-group">
                  <label class="control-label" for="daterange">Date</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input disabled type="date" class="form-control" id="daterange" value="{{$demandevehicule->date}}">
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
                    <input disabled type="time" class="form-control" id="daterange" value="{{$demandevehicule->heur_debut}}">
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
                    <input disabled type="time" class="form-control" id="daterange" value="{{$demandevehicule->heur_fin}}">
                  </div>
                  </div>
                </div>
                        </div>

                         
                        </div>

                       

                              

                <div class="form-group">
                  <label class="control-label" for="textarea2">Commentaire</label>
                  <div class="controls">
                  <textarea disabled id="limit" class="form-control" rows="6" style="width:100%">
                    {{$demandevehicule->commentaire}}
                  </textarea>
                  </div>
                </div>
                              
                        <?php if (Auth::user()->id_role==1): ?>

                           <a class="btn btn-info" href="{{ route ('Reunion.edit', $demandevehicule->id)}}">
                      <i class="fa fa-edit "></i>                                            
                    </a>
                    <a data-toggle="modal" data-target="#myModal{{$demandevehicule->id}}" type="button" class="btn btn-danger" href="#">
                      <i class="fa fa-trash-o "></i> 

                    </a>
                                
                              <?php endif ?>      
                       

                    <div class="modal fade" id="myModal{{$demandevehicule->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Voulez-vous vraiment supprimer cet element ?</h4>
        </div>
        <div class="modal-body">
          <p>Cliquer sur SUPPRIMER si c'est le cas !</p>
        </div>
        <div class="modal-footer">
          <form action="{{ route ('Demandevehicule.update', $demandevehicule->id)}}" method="post" >
               {{ csrf_field() }}
              {{ method_field('PUT') }}
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type=" button submit"><i class="fa fa-trash"></i> Supprimer</button>
                        <input type="hidden" name="sup" value="0">
          </form>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
                                        
                                
                                        
                            
                        </div>
                    </div>
          
        </div><!--/.col-->
      
      </div><!--/.row profile-->  


   

      @endforeach
         @stop