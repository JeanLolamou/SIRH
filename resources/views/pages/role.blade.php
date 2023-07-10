@extends('templates/default')
         @section('contenu')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  
 
          <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-key"></i> GESTION PERSONNEL</h3>
          <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
          <li><i class="fa fa-users"></i><a href="{{route('personnel')}}">Gestion personnel</a></li> <li><i class="fa fa-key"></i>Gestion rôle</li>                
          </ol>
        </div>
      </div>
     
     

      <div class="row">   
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-table red"></i><span class="break"></span><strong>Members</strong></h2>
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
                    <th>Poste</th>
                    <th>Direction</th>
                    <th>Status</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                  </tr>
            </thead>
            <tbody id = "test">
              @foreach ($personnel as $personnel)
                  <tr>
                    <td>{{$personnel->name}} {{$personnel->prenom}}</td>
                    <td>{{$personnel->poste}}</td>
                    <td>{{nom_direction($personnel->id_direction)}}</td>
                  <td>
                    <?php if ($personnel->statut==0): ?>
                      <span class="label label-warning">En Création</span>
                    <?php elseif ($personnel->statut==1): ?>
                      <span class="label label-info" >Actif</span>
                    <?php elseif ($personnel->statut==2): ?>
                      <span class="label label-danger">Inactif</span>
                    <?php endif ?>
                    
                  </td>
                   <td>
                    <?php if ($personnel->id_role==1): ?>
                      <a  class="btn btn-warning" ><i class="fa fa-user"> </i> Collaborateur</a>
                    <?php elseif ($personnel->id_role==2): ?>
                      <a  class="btn btn-success" ><i class="fa fa-suitcase"> </i> Manager</a>
                    <?php elseif ($personnel->id_role==3): ?>
                       <a  class="btn btn-danger" ><i class="fa fa-road"> </i> RH</a>
                    <?php endif ?>
                    
                  </td>
                  <td>
                    <a class="btn btn-success" href="{{ route ('User.show', $personnel->id)}}" title="Voir les details." data-rel="tooltip">
                      <i class="fa fa-search-plus "></i>                                            
                    </a>
                    <a data-toggle="modal" data-target="#modif{{$personnel->id}}" class="btn btn-primary"  href="#" title="Modifier le rôle" data-rel="tooltip">
                      <i class="fa fa-edit " ></i>                                            
                    </a>

                    <!-- Validation -->

                    <div class="modal fade" id="modif{{$personnel->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modification rôle [<span style="color: red;">{{$personnel->name}} {{$personnel->prenom}}</span>]</h4>
        </div>
        <div class="modal-body">
          <p>  <form action="{{ route ('User.update', $personnel->id)}}" method="post" >
               {{ csrf_field() }}
              {{ method_field('PUT') }}
             

                 <div class="form-group">
                                <label for="direction-w1">Role</label>
                          <select class="form-control" name="role">
                           @foreach ($role as $roles)
                            <?php if ($personnel->id_role==$roles->id): ?>
                            <option value="{{$roles->id}}" selected>{{$roles->libelle}}</option>
                            <?php else: ?>
                            <option value="{{$roles->id}}" >{{$roles->libelle}}</option>
                            <?php endif ?>
                            
                             @endforeach
                        </select>
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