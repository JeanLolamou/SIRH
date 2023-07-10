@extends('templates/default')
         @section('contenu')

         

  <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-edit"></i>MODIFICATION</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-briefcase"></i><a href="{{route('demande_conge')}}">Demande de congés</a></li>
            <li><i class="fa fa-edit"></i>Modification</li>       
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
                            <h2><i class="fa fa-edit red"></i><strong>Modification</strong></h2>
                        </div>
                        <div class="panel-body">
                           <form action="{{ route ('Conge.update', $conge->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="hidden" name="modif" value="1">

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
                           @foreach ($type_conge as $type_conge)
                           
                             <?php if ($conge->type==$type_conge->id): ?>
                            <option value="{{$type_conge->id}}" selected>{{$type_conge->libelle}}</option>
                            <?php else: ?>
                             <option value="{{$type_conge->id}}">{{$type_conge->libelle}}</option>
                            <?php endif ?>

                            @endforeach
                          </select>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                          <div class="form-group">
                  <label class="control-label" for="daterange">Date debut</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input name="date_debut"  type="date" class="form-control" id="daterange" value="{{$conge->date_debut}}">
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
                    <input name="date_fin"  type="date" class="form-control" id="daterange" value="{{$conge->date_fin}}">
                  </div>
                  </div>
                </div>
                        </div>

                        <div class="col-md-4">
                           <div class="form-group">
                  <label class="control-label" for="daterange">Durée</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                   
                    <input  type="text" class="form-control" id="daterange" value="{{$conge->nbrjours}}" disabled>
                  </div>
                  </div>
                </div>
                        </div>
                         
                        </div>

                       

                              

                <div class="form-group">
                  <label class="control-label" for="textarea2">Commentaire</label>
                  <div class="controls">
                  <textarea name="commentaire"  id="limit" class="form-control" rows="6" style="width:100%">
                    {{$conge->commentaire}}
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