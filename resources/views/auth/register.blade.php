
     @extends('templates/default')
         @section('contenu')
     <!-- Css files -->
      @if(session()->has('message'))
      <div class="row">
     <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Succés!</strong> {{session()->get('message')}}.
              </div>
              </div>
              @endif

     
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-plus"></i>AJOUT PERSONNEL</h3>
          <ol class="breadcrumb">
           <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-users"></i><a href="{{route('personnel')}}">Gestion personnel</a></li>    
             <li><i class="fa fa-plus"></i>Ajout personnel</li>    
          </ol>
        </div>
      </div>
      
      <div class="row">
        
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-user red"></i><strong>Ajout Personnel</strong></h2>
              <div class="panel-actions">
                <a href="form-elements.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                <a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="form-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
              </div>
            </div>
            <div class="panel-body">
              
              <div id="wizard1" class="wizard-type1">
                <ul class="steps">
                    <li><a href="form-wizard.html#tab11" data-toggle="tab"><span class="badge badge-info"><i class="fa fa-credit-card"></i></span>Identification </a></li>
                  <li><a href="form-wizard.html#tab12" data-toggle="tab"><span class="badge badge-info"><i class="fa fa-user"></i></span> Information</a></li>
                  <li><a href="form-wizard.html#tab13" data-toggle="tab"><span class="badge badge-info"><i class="fa fa-building"></i></span> Profil</a></li>
                  <li><a href="form-wizard.html#tab14" data-toggle="tab"><span class="badge badge-info"><i class="fa fa-check"></i></span> Poste</a></li>
                </ul>
                <div class="progress thin">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                  </div>
                </div>                
                
                <div class="tab-content">
                    <div class="tab-pane" id="tab11">
                   
                       <form method="POST" action="{{ route ('User.store')}}" class="form-horizontal" role="form">
                        @csrf
                      <div class="form-group has-feedback">
                                  <label for="email-w1">Email</label>                                 
                        <input type="email" id="email-w1" name="email" class="form-control" placeholder="Email address">
                                  <span class="help-block">Entrer l'email</span>                                 
                              </div>
                              <div class="form-group has-feedback">
                                  <label for="password-w1">Mot de pass</label>                                 
                                  <input type="password" id="password-w1" name="password" class="form-control" placeholder="Password">
                                  <span class="help-block">Entrer le mot de pass</span>                                  
                              </div>
                      
                    </div>
                    <div class="tab-pane" id="tab12">
                    <div class="row">

                      <div class="col-sm-12">

                        <div class="form-group has-feedback">
                            <label for="name-w1">Nom</label>
                            <input type="text" class="form-control" id="name-w1" name="name" placeholder="Nom">
                          <span class="fa fa-asterisk form-control-feedback"></span>
                          </div>

                      </div>

                    </div><!--/row-->

                    <div class="row">

                      <div class="col-sm-12">

                        <div class="form-group has-feedback">
                            <label for="prenom-w1">Prenom</label>
                            <input type="text" class="form-control" name="prenom" id="prenom-w1" placeholder="Prenom" required="">
                          <span class="fa fa-asterisk form-control-feedback"></span>
                          </div>

                      </div>

                    </div><!--/row-->

                    <div class="row">

                        <div class="form-group col-sm-4">
                            <label for="adresse-w1">Adresse</label>
                            <input type="text" class="form-control" name="adresse" id="adresse-w1" placeholder="Adresse">
                          
                        </div>

                      <div class="form-group col-sm-4">
                          <label for="adresse-w1">Telephone</label>
                            <input type="text" class="form-control" name="tel" id="adresse-w1" placeholder="Telephone">
                        </div>

                    <div class="form-group col-sm-4">
                          <label for="adresse-w1">Telephone Urgence</label>
                            <input type="text" class="form-control" name="tel2" id="adresse-w1" placeholder="Numero en cas d'urgence">
                        </div>

                    </div><!--/row-->
                    </div>
                  <div class="tab-pane" id="tab13">
                      <div class="row">

                        <div class="form-group col-sm-6">
                            <label for="direction-w1">Direction</label>
                          <select class="form-control" name="direction">
                            @foreach ($direction as $direction)
                            
                            <option value="{{$direction->id}}" >{{$direction->nom}}</option>
                            
                             @endforeach
                        </select>
                          
                        </div>

                      <div class="form-group col-sm-6">
                          <label for="Service-w1">Service</label>
                            <select class="form-control" name="service">
                             @foreach ($service as $service)
                            
                            <option value="{{$service->id}}" >{{$service->nom}}</option>
                            
                             @endforeach
                        </select>
                        </div>

                   

                    </div><!--/row-->
                    

                  
                    </div>
                  <div class="tab-pane" id="tab14">
                  
                    <div class="form-group">
                        <label for="company-w1">Poste</label>
                        <input type="text" name="poste" class="form-control" id="poste-w1" placeholder="Poste">
                      </div>
                         <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                <label for="direction-w1">Role</label>
                          <select class="form-control" name="role">
                           @foreach ($role as $roles)
                            <option value="{{$roles->id}}" >{{$roles->libelle}}</option>
                             @endforeach
                        </select>
                        </div>
                           </div>

                             <div class="col-md-4">
                              <div class="checkbox">
                                    <label for="checkbox1">
                                      <input type="checkbox" id="checkbox1" name="actif" value="1" checked> Activer à la création?
                                    </label>
                                </div>
                           </div>
                         </div><!--/row-->
                   
                    </div>
            
                </div>
                
                <div class="actions">               
                  <input type="button" class="btn btn-default button-previous" name="prev" value="Prev" />
                  <input type="button" class="btn btn-success button-next pull-right" name="next" value="Next" />
                  <button type="submit" class="btn btn-primary button-finish pull-right" style="display:none">Ajouter</button>
                 
                </div>
                  
              </div>

            </div>
            </form> 

          </div>
          
        </div><!--/col-->
      </div><!--/row-->
     
  
  
    
 
 
  
  
  
@stop