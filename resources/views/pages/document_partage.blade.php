@extends('templates/default')
         @section('contenu')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  
          <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-folder-open"></i> Documents utiles</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-folder-open"></i><a href="{{route('document')}}">Mes documents</a></li> 
             <li><i class="fa fa-file"></i>Documents utiles</li>                
          </ol>
        </div>
      </div>
     <div class="row">
        
        <?php if (Auth::user()->id_role==3): ?>
          <div class="col-md-5 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat red-bg">
            <a href="#" data-toggle="modal" data-target="#partage"><i class="fa fa-retweet white-bg"></i>

            <span class="title">Partager des  documents</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->
        <?php endif ?>


         <!-- Validation -->

                    <div class="modal fade" id="partage">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Partage de documents</h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ route ('Documents.store')}}" enctype="multipart/form-data">
                        @csrf
          <p>         <div class="form-group">
                            <label for="textarea-input">Libelle</label>
                            <div class="">
                               <input type="text" name="details" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                             <label for="direction-w1">Confidentialité</label>
                          <select class="form-control" name="confidentialite">
                             <option value="0" >Public</option>
                            <option value="1" >Manager</option>
                            <option value="2" >RH</option>
                          </select>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <label for="nf-password">Joindre fichier</label>
                            <input type="file" name="fichier" class="form-control" placeholder="" required>
                            
                        </div>
                          </div>
                        </div>

                          </p>
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <button class="btn btn-primary" type=" button submit"><i class="fa fa-trash"></i> Partager</button>
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
              <h2><i class="fa fa-folder-open red"></i><span class="break"></span><strong>Tous mes documents</strong></h2>
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
                    <th>Document</th>
                    <th>Type</th>
                    <th>Confidentialité</th>
                    <th>Actions</th>
                  </tr>
            </thead>
            <tbody id = "test">
              @foreach ($document as $documents)
                  <tr>
                    <?php if ($documents->type=="partage"): ?>
                      <td>
                        
                       <a class="btn" target="_blank" href="{{ asset('document/document_partager/'.$documents->libelle.'')}}" download title="Voir le document" data-rel="tooltip">
                      <img class="img-profile" src="{{ asset('img/fichier.png')}}" style="max-height: 50px;max-width: 50px;">                                
                    </a>
                  </td>
                    <td>
                       [<span style="color: red;">Partagé</span>] {{$documents->details}} 
                    </td>
                  <td>
                    <?php if ($documents->confidentialite==0): ?>
                      <span class="label label-warning">Public</span>
                    <?php elseif ($documents->confidentialite==1): ?>
                      <span class="label label-success" >Manager</span>
                    <?php elseif ($documents->confidentialite==2): ?>
                      <span class="label label-danger">RH</span>
                    <?php endif ?>
                  </td>
                  <td>
                     
                    <?php if (Auth::user()->id_role==3): ?>
                         <a data-toggle="modal" data-target="#myModal{{$documents->id}}" type="button" class="btn btn-default" href="#" title="Suppression" data-rel="tooltip">
                      <i class="fa fa-trash-o "></i> 

                    </a>
                    <?php endif ?>
                  </td>
                   <?php endif ?>
                 
                  
                </tr>

                 <!-- Suppression -->

                    <div class="modal fade" id="myModal{{$documents->id}}">
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
          <form action="{{ route ('Documents.update', $documents->id)}}" method="post" >
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