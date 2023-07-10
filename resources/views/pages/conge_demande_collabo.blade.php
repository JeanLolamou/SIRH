@extends('templates/default')
         @section('contenu')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  
          <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-briefcase"></i> DEMANDES DE CONGES</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-briefcase"></i>Demande de congés</li>                
          </ol>
        </div>
      </div>
     <div class="row">
        
        <div class="col-md-5 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat red-bg">
            <a href="{{route('Conge.create')}}"><i class="fa fa-plus white-bg"></i>

            <span class="title">Nouvelle demande de congés</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->

        

         <div class="col-md-3 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat magenta-bg">
            <a href="{{route('planning_conge')}}"><i class="fa  fa-calendar white-bg"></i>

            <span class="title">Planning</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->

         <div class="col-md-3 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat green-bg">
            <a href="{{route('etat_conge',Auth::user()->id)}}"><i class="fa fa-calendar white-bg"></i>

            <span class="title">Solde Congé</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->
         
        
             
      
      </div><!--/.row-->  
     

      <div class="row">   
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-table red"></i><span class="break"></span><strong>Mes demandes de congés</strong></h2>
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
                    <th>Employé</th>
                    <th>libelle</th>
                    <th>Nbre Jours</th>
                    <th>Date debut</th>
                    <th>Date fin</th>
                    <th>Responsable</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
            </thead>
            <tbody id = "test">
              @foreach ($conge as $conge)
                  <tr>
                    <td>{{nom_user($conge->id_user)}}</td>
                    <td>{{type_conge($conge->type)}}</td>
                    <td>{{$conge->nbrjours}}</td>
                    <td>{{(new DateTime($conge->date_debut))->format("d-M-Y")}}</td>
                    <td>{{(new DateTime($conge->date_fin))->format("d-M-Y")}}</td>
                    <td>{{nom_user($conge->responsable)}}</td>
                  <td>
                    <?php if ($conge->statut==0): ?>
                      <span class="label label-warning">En Cours</span>
                    <?php elseif ($conge->statut==1): ?>
                      <span class="label label-info" >Validée</span>
                    <?php elseif ($conge->statut==2): ?>
                      <span class="label label-danger">Annulée</span>
                    <?php endif ?>
                    
                  </td>
                  <td>
                    
                     <?php if ($conge->document==1): ?>
               <a class="btn btn-warning" target="_blank" href="{{ asset('document/conge/'.document_conge($conge->id).'')}}" download title="Voir le fichier joint" data-rel="tooltip">
                      <i class="fa fa-file"></i>                                            
                    </a>
            <?php endif ?>
                    <a class="btn btn-success" href="{{ route ('Conge.show', $conge->id)}}" title="Voir plus de details" data-rel="tooltip">
                      <i class="fa fa-search-plus "></i>                                            
                    </a>

                   <?php if ($conge->statut==0): ?>
                      <a class="btn btn-info" href="{{ route ('Conge.edit', $conge->id)}}" title="Modifier" data-rel="tooltip">
                      <i class="fa fa-edit "></i>                                            
                    </a>
                    <a data-toggle="modal" data-target="#myModal{{$conge->id}}" type="button" class="btn btn-default" href="#" title="Suppression" data-rel="tooltip">
                      <i class="fa fa-trash-o "></i> 

                    </a>
                   <?php endif ?>

                    <!-- Suppression -->

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