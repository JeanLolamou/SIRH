@extends('templates/default')
         @section('contenu')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  
          <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-plus"></i> Type de congés</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li> 
             <li><i class="fa fa-plus"></i>Type de congés</li>                
          </ol>
        </div>
      </div>
     <div class="row">
        
        <?php if (Auth::user()->id_role==3): ?>
          <div class="col-md-5 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat red-bg">
            <a href="#" data-toggle="modal" data-target="#ajout"><i class="fa fa-plus white-bg"></i>

            <span class="title">Ajout type de congés</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->
        <?php endif ?>


         <!-- Validation -->

                    <div class="modal fade" id="ajout">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Ajout type de congés</h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ route ('Typeconge.store')}}" enctype="multipart/form-data">
                        @csrf
          <p>         <div class="form-group">
                            <label for="textarea-input">Libelle</label>
                            <div class="">
                               <input type="text" name="libelle" class="form-control" required>
                            </div>
                        </div>

                          </p>
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <button class="btn btn-primary" type=" button submit"><i class="fa fa-trash"></i> Ajouter</button>
                        <input type="hidden" name="valide" value="0">
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
              <h2><i class="fa fa-folder-open red"></i><span class="break"></span><strong>Types de congés</strong></h2>
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
                    <th>Libelle</th>
                    <th>Actions</th>
                  </tr>
            </thead>
            <tbody id = "test">
              @foreach ($typeconge as $typeconge)
                  <tr>
                   <td>   
                     {{$typeconge->libelle}}
                  </td>
                  <td>
                     
                    <?php if (Auth::user()->id_role==3): ?>
                         <a data-toggle="modal" data-target="#myModal{{$typeconge->id}}" type="button" class="btn btn-default" href="#" title="Suppression" data-rel="tooltip">
                      <i class="fa fa-trash-o "></i> 

                    </a>
                    <?php endif ?>
                  </td>
                 
                  
                </tr>

                 <!-- Suppression -->

                    <div class="modal fade" id="myModal{{$typeconge->id}}">
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
          <form action="{{ route ('Typeconge.update', $typeconge->id)}}" method="post" >
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