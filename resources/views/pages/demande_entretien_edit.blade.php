@extends('templates/default')
         @section('contenu')

         

  <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-edit"></i> MODIFICATION</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><a href="{{route('demande_entretien')}}"><i class="fa fa-suitcase"></i>Demande entretien</a></li>  
            <li><i class="fa fa-edit"></i>Modification</li>                
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
                            <h2><i class="fa fa-edit red"></i><strong>Modification</strong></h2>
                        </div>
                        <div class="panel-body">
                           <form action="{{ route ('DemandeEntretien.update', $demandeentretien->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="modif" value="1">

                          <div class="form-group">
                             <label for="direction-w1">Collaborateur</label>
                          <select class="form-control" name="personnel">
                              @foreach ($personnel as $personnel)
                             <?php if ($personnel->id==$demandeentretien->id_user): ?>
                            <option value="{{$personnel->id}}" selected>{{$personnel->name}} {{$personnel->prenom}}</option>
                            <?php else: ?>
                             <option value="{{$personnel->id}}">{{$personnel->name}} {{$personnel->prenom}}</option>
                            <?php endif ?>
                            @endforeach
                             </select>
                        </div>


                         <div class="form-group">
                             <label for="direction-w1">Type entretien</label>
                          <select class="form-control" name="type">
                            <option value="{{$demandeentretien->libelle}}">{{$demandeentretien->libelle}}</option>
                             <option value="RH" >RH</option>
                            <option value="DG" >DG</option>
                          </select>
                        </div>


                           <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                            <label for="textarea-input">Date</label>
                            <div class="">
                                <input class="form-control" type="date" name="date" value="{{$demandeentretien->date}}" required="">
                            </div>
                        </div>
                          </div>
                           <div class="col-md-5">
                              <div class="form-group">
                            <label for="textarea-input">Heure</label>
                            <div class="">
                                <input class="form-control" type="time" name="heur" value="{{$demandeentretien->heur}}" required="">
                            </div>
                        </div>
                          </div>
                        </div>
                            


                <div class="form-group">
                            <label for="textarea-input">Commentaire</label>
                            <div class="">
                                <textarea id="textarea-input" name="description" rows="9" class="form-control" placeholder="Commentaire.." required=>
                                  {{$demandeentretien->description}}
                                </textarea>
                            </div>
                        </div>
               
                    
                    
                                
                                        
                            
                        </div>
                         <div class="panel-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> Modifier</button>
                          <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Annuler</button>
                    </div>
                    </div>
                    </form>
        </div><!--/.col-->
      
      </div><!--/.row profile-->  


   

      @endforeach
         @stop