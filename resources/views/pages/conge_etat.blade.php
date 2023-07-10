@extends('templates/default')
         @section('contenu')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

  

         <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-edit"></i>etat congé</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-briefcase"></i><a href="{{route('demande_conge')}}">Demande de congés</a></li>
            <li><i class="fa fa-edit"></i>Etat de congé</li>       
          </ol>
        </div>
      </div>
    
     

      <div class="row">   
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-table red"></i><span class="break"></span><strong>Solde congé</strong></h2>
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
                    
                    <th>Acquis</th>
                    <th>Pris</th>
                    <th>Solde</th>
                    <th>Actions</th>
                  </tr>
            </thead>
            <tbody id = "test">
            
              <?php 
              $solde=0;
              $solde=30-$conge;
               ?>
                  <tr>
                    <td>{{nom_user($id_user)}}</td>
                    <td>30</td>
                    <td>{{$conge}}</td>
                    <td>{{$solde}}</td>
                  <td>
                   <?php if (Auth::user()->id_role==3): ?>
                      <a class="btn btn-success" href="#">
                      <i class="fa fa-search-plus "></i>                                            
                    </a>
                    <a class="btn btn-info" href="#">
                      <i class="fa fa-edit "></i>                                            
                    </a>
                    <a class="btn btn-danger" href="#">
                      <i class="fa fa-trash-o "></i> 

                    </a>
                   <?php endif ?>
                    
                  </td>
                  
                </tr>
               
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