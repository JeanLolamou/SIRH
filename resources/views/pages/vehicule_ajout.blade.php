
     @extends('templates/default')
         @section('contenu')
     <!-- Css files -->
    
         <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-plus"></i> Nouvelle réservation de vehicule</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-building-o"></i><a href="{{route('demande_vehicule')}}">Demande de vehicule</a></li>   
            <li><i class="fa fa-plus"></i>Nouvelle réservation de vehicule</li>              
          </ol>
        </div>
      </div>
      
      <div class="row">
        
        <div class="col-lg-12">
           <div class="panel panel-default">
                  <div class="panel-heading">
                      <h2><i class="fa fa-indent red"></i><strong>Nouvelle réservation de vehicule</strong></h2>
                  </div>
                  <div class="panel-body">
             <form method="POST" action="{{ route ('Demandevehicule.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                             <label for="direction-w1">Solliciteur</label>
                          <select class="form-control" name="personnel">
                            @foreach ($personnel as $personnel)
                            <option value="{{$personnel->id}}" >{{$personnel->name}} {{$personnel->prenom}}</option>@endforeach
                          </select>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                             <label for="direction-w1">Sujet</label>
                        <input type="text" id="nf-password" name="libelle" class="form-control" placeholder="Sujet">
                        </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                             <label for="direction-w1">Vehicule</label>
                          <select class="form-control" name="vehicule">
                            @foreach ($vehicules as $vehicules)
                            <option value="{{$vehicules->id}}">{{$vehicules->nom}}</option>
                            @endforeach
                          </select>
                        </div>
                          </div>
                        </div>
                       
                       
                        <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                            <label for="nf-password">Date Demande</label>
                            <input type="date" id="nf-password" name="date" class="form-control" placeholder="" required>
                        </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                            <label for="nf-password">Heure Debut</label>
                            <input type="time" id="nf-password" name="heur_debut" class="form-control" placeholder="" required>
                        </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                            <label for="nf-password">Heure Fin</label>
                            <input type="time" id="nf-password" name="heur_fin" class="form-control" placeholder="" required>
                        </div>
                          </div>
                        </div>

                          <div class="form-group">
                            <label for="textarea-input">Commentaire</label>
                            <div class="">
                                <textarea id="textarea-input" name="commentaire" rows="9" class="form-control" placeholder="Commentaire.."></textarea>
                            </div>
                        </div>
                        
                    
            </div>
            <div class="panel-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> Submit</button>
                          <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                    </div>
              </div>
        </div><!--/col-->
      </form>
      </div><!--/row-->
     
  
  
    
 
 
  
  
  
@stop