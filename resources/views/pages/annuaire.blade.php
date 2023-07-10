@extends('templates/default')
         @section('contenu')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
    
        
     
     

      <div class="row">   
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-table red"></i><span class="break"></span><strong>Annuaire</strong></h2>
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
                    <th>Photo</th>
                    <th>Collaborateur</th>
                    <th>E-mail</th>
                    <th>Telephone</th>
                    <th>Poste</th>
                    <th>Direction</th>
                    
                  </tr>
            </thead>
            <tbody id = "test">
              @foreach ($annuaire as $annuaire)
                  <tr>
                    <td> <img class="img-rounded" src="{{ asset('images/profil/'.photo($annuaire->id).'')}}" style="max-height: 50px;max-width: 60px;border-radius: 50%;"></td>
                    <td>{{$annuaire->name}} {{$annuaire->prenom}}</td>
                    <td>{{$annuaire->email}}</td>
                    <td>{{$annuaire->tel}}</td>
                    <td>{{$annuaire->poste}}</td>
                    <td>{{nom_direction($annuaire->id_direction)}}</td>
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