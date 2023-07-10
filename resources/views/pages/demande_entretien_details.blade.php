@extends('templates/default')
         @section('contenu')

         

   <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-edit"></i> MODIFICATION</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><a href="{{route('demande_entretien')}}"><i class="fa fa-suitcase"></i>Demande entretien</a></li>  
            <li><i class="fa fa-file"></i>Details</li>                
          </ol>
        </div>
      </div>

@foreach ($demandeentretien as $demandeentretien)

<div class="row">
        

      <div class="row profile">
        
        <div class="col-md-4">
          
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="text-center">
                <img class="img-profile" src="{{ asset('images/profil/'.photo($demandeentretien->id_user).'')}}" style="max-height: 100px;max-width: 100px;">
              </div>
              
              <h3 class="text-center"><strong>{{nom_user($demandeentretien->id_user)}}</strong></h3>
             
              
              <hr>
              
                
              
              
              
            </div>  
            
          </div>
        
        </div><!--/.col-->
        
        <div class="col-md-8">
        
                    <div class="panel panel-default">                               
                        <div class="panel-heading">
                            <h2><i class="fa fa-file red"></i><strong>Details</strong></h2>
                        </div>
                        <div class="panel-body">
                           <form action="{{ route ('DemandeEntretien.update', $demandeentretien->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="modif" value="1">

                               <div class="form-group">
                             <label for="direction-w1">Libelle</label>
                          <input name="libelle" type="text" class="form-control" id="daterange" value="{{$demandeentretien->libelle}}" disabled="">
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                            <label for="textarea-input">Date</label>
                            <div class="">
                                <input class="form-control" type="date" name="date" value="{{$demandeentretien->date}}" disabled="">
                            </div>
                        </div>
                          </div>
                           <div class="col-md-4">
                              <div class="form-group">
                            <label for="textarea-input">Heure</label>
                            <div class="">
                                <input class="form-control" type="time" name="heur" value="{{$demandeentretien->heur}}" disabled="">
                            </div>
                        </div>
                        
                        </div>
                          <div class="col-md-4">
                          <div class="form-group">
                  <label class="control-label" for="daterange">Statut</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                    <?php if ($demandeentretien->statut==0): ?>
                      <span class="label label-warning">En Cours</span>
                    <?php elseif ($demandeentretien->statut==1): ?>
                      <span class="label label-info" >Repondue</span>
                    <?php elseif ($demandeentretien->statut==2): ?>
                      <span class="label label-danger">Annulée</span>
                    <?php endif ?>
                  </div>
                  </div>
                </div>
                        </div>
      
                         
                        </div>

                       

                              

                <div class="form-group">
                  <label class="control-label" for="textarea2">Commentaire</label>
                  <div class="controls">
                  <textarea name="description"  id="limit" class="form-control" rows="6" style="width:100%" disabled="">
                    {{$demandeentretien->description}}
                  </textarea>
                  </div>
                </div>   

               
               
                    
                                
                                        
                            </form>
                        </div>
                    </div>
          
        </div><!--/.col-->
      
      </div><!--/.row profile-->  


   

      @endforeach
         @stop