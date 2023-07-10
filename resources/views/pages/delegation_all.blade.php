@extends('templates/default')
         @section('contenu')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->

 
          <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-exchange"></i> Liste délégation</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
             <li><i class="fa fa-exchange"></i><a href="{{route('delegation')}}">Délégation</a></li>
            <li><i class="fa fa-list"></i>Toutes les délégations</li>                
          </ol>
        </div>
      </div>
     
     

      <div class="row">   
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-table red"></i><span class="break"></span><strong>Toutes les délégations</strong></h2>
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
                    <th>Date</th>
                    <th>Delegant</th>
                    <th>Delegué</th>
                    <th>Etat</th>
                    <th>Actions</th>
                  </tr>
            </thead>
            <tbody id = "test">
              @foreach ($delegation as $delegation)
                  <tr>
                    <td>{{(new DateTime($delegation->date))->format("d-M-Y")}}</td>
                     <td>{{nom_user($delegation->id_delegant)}}</td>
                    <td>{{nom_user($delegation->id_delegue)}}</td>
                    <td>
                    <?php if ($delegation->supprimer==0): ?>
                      <span class="label label-info" >Active</span>
                    <?php elseif ($delegation->supprimer==1): ?>
                      <span class="label label-danger">Inactive</span>
                    <?php endif ?>
                    
                  </td>
                  <td>
                   
                    <?php if ($delegation->supprimer==0): ?>
                      <a data-toggle="modal" data-target="#myModal{{$delegation->id}}" type="button" class="btn btn-danger" href="#" title="Desactiver" data-rel="tooltip">
                      <i class="fa fa-times "></i> 

                    </a>
                    <?php endif ?>

                    <!-- Suppression -->

                    <div class="modal fade" id="myModal{{$delegation->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Voulez-vous vraiment DESACTIVER cette délégation ?</h4>
        </div>
        <div class="modal-body">
          <p>Cliquer sur DESACTIVER si c'est le cas !</p>
        </div>
        <div class="modal-footer">
          <form action="{{ route ('Delegation.update', $delegation->id)}}" method="post" >
               {{ csrf_field() }}
              {{ method_field('PUT') }}
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <button class="btn btn-primary" type=" button submit"><i class="fa fa-trash"></i> DESACTIVER</button>
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