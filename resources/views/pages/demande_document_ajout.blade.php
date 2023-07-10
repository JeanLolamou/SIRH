
     @extends('templates/default')
         @section('contenu')
     <!-- Css files -->
    

     
     <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-plus"></i>Nouvelle demande de document</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-briefcase"></i><a href="{{route('demande_document')}}">Demande de document</a></li>
            <li><i class="fa fa-plus"></i>Nouvelle demande de document</li>       
          </ol>
        </div>
      </div>
      
      <div class="row">
        
        <div class="col-lg-12">
           <div class="panel panel-default">
                  <div class="panel-heading">
                      <h2><i class="fa fa-indent red"></i><strong>Nouvelle demande de document</strong></h2>
                  </div>
                  <div class="panel-body">
             <form method="POST" action="{{ route ('DemandeDocument.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                             <label for="direction-w1">Solliciteur</label>
                          <select class="form-control" name="personnel">
                            @foreach ($personnel as $personnel)
                            <option value="{{$personnel->id}}" >{{$personnel->name}} {{$personnel->prenom}}</option>@endforeach
                          </select>
                        </div>
                        <div class="form-group">
                             <label for="direction-w1">Sujet</label>
                        <input type="text" id="nf-password" name="sujet" class="form-control" placeholder="Sujet" required>
                        </div>
                     

                          <div class="form-group">
                            <label for="textarea-input">Commentaire</label>
                            <div class="">
                                <textarea id="textarea-input" name="description" rows="9" class="form-control" placeholder="Commentaire.." required=></textarea>
                            </div>
                        </div>

                           <div class="form-group">
                            <label for="nf-password">Joindre fichier</label>
                            <input type="file" id="nf-password" name="fichier" class="form-control" placeholder="">
                            
                        </div>
                        
                    
            </div>
            <div class="panel-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> Envoyer</button>
                          <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Annuler</button>
                    </div>
              </div>
        </div><!--/col-->
      </form>
      </div><!--/row-->
     
  
  
    
 
 
  
  
  
@stop