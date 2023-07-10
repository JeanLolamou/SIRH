@extends('templates/default')
         @section('contenu')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
          <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> GESTION PERSONNEL</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-laptop"></i>Gestion personnel</li>                
          </ol>
        </div>
      </div>
     <div class="row">
        <?php if (Auth::user()->isadmin==1): ?>
           <div class="col-md-3 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat red-bg">
            <a href="{{route('inscription')}}"><i class="fa fa-plus white-bg"></i>

            <span class="title">Ajout Personnel</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->
        <?php endif ?>
       
         <div class="col-md-3 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat magenta-bg">
            <a href="{{route('role')}}"><i class="fa fa-key white-bg"></i>

            <span class="title">Géstion Role</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->
         <div class="col-md-3 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat blue-bg">
            <a href="{{route('delegation')}}"><i class="fa fa-exchange white-bg"></i>

            <span class="title">Délégation</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->
        
             
      
      </div><!--/.row-->  
     

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
                    <a class="btn btn-success" href="{{ route ('User.show', $personnel->id)}}" title="Voir les details." data-rel="tooltip">
                      <i class="fa fa-search-plus "></i>                                            
                    </a>
                    <a class="btn btn-info" href="{{ route ('User.edit', $personnel->id)}}" title="Modifier." data-rel="tooltip">
                      <i class="fa fa-edit " ></i>                                            
                    </a>
                    <a class="btn btn-danger" href="{{ route ('User.edit', $personnel->id)}}" title="Supprimer." data-rel="tooltip">
                      <i class="fa fa-trash-o " ></i> 

                    </a>
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