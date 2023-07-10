@extends('templates/default')
         @section('contenu')

        

  <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-file"></i>DETAILS</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-briefcase"></i><a href="{{route('demande_conge')}}">Demande de congés</a></li>
            <li><i class="fa fa-file"></i>Details</li>       
          </ol>
        </div>
      </div>

@foreach ($conge as $conge)

<div class="row">
        

      <div class="row profile">
        
        <div class="col-md-4">
          
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="text-center">
                <img class="img-profile" src="{{ asset('images/profil/'.photo($conge->id_user).'')}}" style="max-height: 100px;max-width: 100px;">
              </div>
              
              <h3 class="text-center"><strong>{{nom_user($conge->id_user)}}</strong></h3>
             
              
              <hr>
              
                
              
              
              
            </div>  
            
          </div>
        
        </div><!--/.col-->
        
        <div class="col-md-8">
        
                    <div class="panel panel-default">                               
                        <div class="panel-heading">
                            <h2><i class="fa fa-file red"></i><strong>Détails</strong></h2>
                        </div>
                        <div class="panel-body">
                          

                         <div class="form-group">
                            
                          <?php if ($conge->document==1): ?>
                             <label for="direction-w1">Fichier joint :</label>
               <a class="btn btn-danger" target="_blank" href="{{ asset('document/conge/'.document_conge($conge->id).'')}}" download>
                      <i class="fa fa-file"></i>                                            
                    </a>
            <?php endif ?>
                        </div>

                           <div class="form-group">
                             <label for="direction-w1">Type</label>
                          <select class="form-control" name="type">
                           
                            <option value="" >{{type_conge($conge->type)}}</option>
                          </select>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                          <div class="form-group">
                  <label class="control-label" for="daterange">Date debut</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input disabled type="date" class="form-control" id="daterange" value="{{$conge->date_debut}}">
                  </div>
                  </div>
                </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                  <label class="control-label" for="daterange">Date Fin</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input disabled type="date" class="form-control" id="daterange" value="{{$conge->date_fin}}">
                  </div>
                  </div>
                </div>
                        </div>

                        <div class="col-md-4">
                           <div class="form-group">
                  <label class="control-label" for="daterange">Durée</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                   
                    <input disabled type="text" class="form-control" id="daterange" value="{{$conge->nbrjours}}">
                  </div>
                  </div>
                </div>
                        </div>
                         
                        </div>

                       

                              

                <div class="form-group">
                  <label class="control-label" for="textarea2">Commentaire</label>
                  <div class="controls">
                  <textarea disabled id="limit" class="form-control" rows="6" style="width:100%">
                    {{$conge->commentaire}}
                  </textarea>
                  </div>
                </div>
                              
                              
                     @if(Auth::user()->id_role==3)
                        <a class="btn btn-info" href="{{ route ('Conge.edit', $conge->id)}}">
                      <i class="fa fa-edit "></i>                                            
                    </a>
                    <a data-toggle="modal" data-target="#myModal{{$conge->id}}" type="button" class="btn btn-danger" href="#">
                      <i class="fa fa-trash-o "></i> 

                    </a>
                     @endif

                    <div class="modal fade" id="myModal{{$conge->id}}">
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
          <form action="{{ route ('Conge.update', $conge->id)}}" method="post" >
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