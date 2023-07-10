@extends('templates/default')
         @section('contenu')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  
         <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-ticket"></i> DEMANDES D'ENTRETIENS</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-ticket"></i>Demande d'entretiens</li>                
          </ol>
        </div>
      </div>
     <div class="row">
        
        <div class="col-md-5 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat red-bg">
            <a href="#" data-toggle="modal" data-target="#entretien"><i class="fa fa-plus white-bg"></i>

            <span class="title">Nouvelle demande d'entretiens</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->

          <!-- Entretien -->

                    <div class="modal fade" id="entretien">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Démande d'entretiens</h4>
        </div>
        <div class="modal-body">
          <p>  <form method="POST" action="{{ route ('DemandeEntretien.store')}}" enctype="multipart/form-data">
                        @csrf
             
                       <div class="form-group">
                             <label for="direction-w1">Collaborateur</label>
                          <select class="form-control" name="personnel">
                            @foreach ($personnel as $personnel)
                            <option value='{{$personnel->id}}' >{{$personnel->name}} {{$personnel->prenom}}</option>@endforeach
                          </select>
                        </div>

                         <div class="form-group">
                             <label for="direction-w1">Type entretien</label>
                          <select class="form-control" name="type">
                            <option value="RH" >RH</option>
                            <option value="MANAGER" >MANAGER</option>
                            <option value="DG" >DG</option>
                          </select>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                            <label for="textarea-input">Date</label>
                            <div class="">
                                <input type="date" name="date" class="form-control" required="">
                            </div>
                        </div>
                          </div>
                           <div class="col-md-6">
                              <div class="form-group">
                            <label for="textarea-input">Heure</label>
                            <div class="">
                                <input type="time" name="heur" class="form-control" required="">
                            </div>
                        </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="textarea-input">Commentaire</label>
                            <div class="">
                                <textarea id="textarea-input" name="description" rows="9" class="form-control" placeholder="Commentaire.." required=></textarea>
                            </div>
                        </div>

            </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <button class="btn btn-primary" type=" button submit"><i class="fa fa-trash"></i> VALIDER</button>
                        <input type="hidden" name="modif_role" value="0">
          </form>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
         
        
             
      
      </div><!--/.row-->  
     

      <div class="row">   
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-table red"></i><span class="break"></span><strong>Liste des demandes</strong></h2>
              <div class="panel-actions">
                <a href="table.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                <a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="table.html#" class="btn-close"><i class="fa fa-times"></i></a>
              </div>
            </div>
            <div class="panel-body">
              
 <input class = "form-control" id = "demo" type = "text" placeholder = "Seach here,..">
         <br>
         <table class = "table table-bordered table-striped">
            <thead>
               <tr>
                    <th>Date Demande</th>
                    <th>Heure</th>
                    <th>Solliciteur</th>
                    <th>libelle</th>
                    <th>Details</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
            </thead>
            <tbody id = "test">
              @foreach ($demandeentretien as $demandeentretien)
                  <tr>
                    <td>{{(new DateTime($demandeentretien->date))->format("d-M-Y")}}</td>
                    <td>{{$demandeentretien->heur}}</td>
                    <td>{{nom_user($demandeentretien->id_user)}}</td>
                    <td>{{$demandeentretien->libelle}}</td>
                    <td>{{$demandeentretien->description}}</td>
                    <td>Demande Entretien</td>
                  <td>
                    <?php if ($demandeentretien->statut==0): ?>
                      <span class="label label-warning">En Cours</span>
                    <?php elseif ($demandeentretien->statut==1): ?>
                      <span class="label label-info" >Validée</span>
                    <?php elseif ($demandeentretien->statut==2): ?>
                      <span class="label label-danger">Annulée</span>
                    <?php endif ?>
                    
                  </td>
                  <td>
                    <a class="btn btn-success" href="{{ route ('DemandeEntretien.show', $demandeentretien->id)}}" title="Voir plus de details." data-rel="tooltip">
                      <i class="fa fa-search-plus "></i>                                            
                    </a>
                     <?php if ($demandeentretien->statut==0): ?>
                      <?php if ((Auth::user()->id==$demandeentretien->id_responsable)or((Auth::user()->id_role==3)and($demandeentretien->id_responsable==0))): ?>
                         <a data-toggle="modal" data-target="#valide{{$demandeentretien->id}}" class="btn btn-primary"  href="#" title="Repondre à la demande" data-rel="tooltip">
                      <i class="fa fa-check"></i>                                            
                    </a>
                     <a data-toggle="modal" data-target="#annule{{$demandeentretien->id}}" class="btn btn-danger"  href="#" title="Annuler la demande." data-rel="tooltip">
                      <i class="fa fa-times"></i>                                            
                    </a>
                      <?php endif ?>

                      @if(Auth::user()->id==$demandeentretien->id_user)
                       <a class="btn btn-info" href="{{ route ('DemandeEntretien.edit', $demandeentretien->id)}}">
                      <i class="fa fa-edit " title="Modifier." data-rel="tooltip"></i>                                            
                    </a>
                      <a data-toggle="modal" data-target="#myModal{{$demandeentretien->id}}" type="button" class="btn btn-default" href="#" title="Supprimer." data-rel="tooltip">
                      <i class="fa fa-trash-o "></i> 

                    </a>
                      @endif
                       

            <?php endif ?>
                     
                   
                  
                    <!-- Validation -->

                    <div class="modal fade" id="valide{{$demandeentretien->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Voulez-vous vraiment VALIDER cette demande ?</h4>
        </div>
        <div class="modal-body">
           <form action="{{ route ('DemandeEntretien.update', $demandeentretien->id)}}" method="post" >
               {{ csrf_field() }}
              {{ method_field('PUT') }}
               <p>   <div class="form-group">
                            <label for="textarea-input">Details Validation</label>
                            <div class="">
                                <textarea id="textarea-input" name="reponse" rows="9" class="form-control" placeholder="Commentaire.." required=></textarea>
                            </div>
                        </div>

                       

                          </p>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <button class="btn btn-primary" type=" button submit"><i class="fa fa-trash"></i> VALIDER</button>
                        <input type="hidden" name="valide" value="0">
          </form>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <!-- Annulation -->

                    <div class="modal fade" id="annule{{$demandeentretien->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Voulez-vous vraiment ANNULER cette demande ?</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route ('DemandeEntretien.update', $demandeentretien->id)}}" method="post" >
               {{ csrf_field() }}
              {{ method_field('PUT') }}
               <p>   <div class="form-group">
                            <label for="textarea-input">Details Validation</label>
                            <div class="">
                                <textarea id="textarea-input" name="reponse" rows="9" class="form-control" placeholder="Commentaire.." required=></textarea>
                            </div>
                        </div>

                       

                          </p>
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          <button class="btn btn-primary" type=" button submit"><i class="fa fa-trash"></i> VALIDER</button>
                        <input type="hidden" name="annule" value="0">
          </form>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


   <!-- Suppression -->

                    <div class="modal fade" id="myModal{{$demandeentretien->id}}">
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
          <form action="{{ route ('DemandeEntretien.update', $demandeentretien->id)}}" method="post" >
               {{ csrf_field() }}
              {{ method_field('PUT') }}
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <button class="btn btn-primary" type=" button submit"><i class="fa fa-trash"></i> SUPPRIMER</button>
                        <input type="hidden" name="sup" value="0">
          </form>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->





                  </td>
                </tr>
                 @endforeach
               
            </tbody>
         </table>      
            </div>
          </div>
        </div><!--/col-->
      
      </div><!--/row--> 

      <script>
         $(document).ready(function(){
            $("#demo").on("keyup", function() {
               var value = $(this).val().toLowerCase();
               $("#test tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
               });
            });
         });
      </script> 
      
         @stop