@extends('templates/default')
         @section('contenu')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  
         <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-suitcase"></i> DEMANDES DE DOCUMENTS</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-suitcase"></i>Demande de document</li>                
          </ol>
        </div>
      </div>
     <div class="row">
        
        <div class="col-md-5 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat red-bg">
            <a href="{{route('DemandeDocument.create')}}"><i class="fa fa-plus white-bg"></i>

            <span class="title">Nouvelle demande de document</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->

         <!-- <div class="col-md-3 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat magenta-bg">
            <a href="{{route('planning_salle')}}"><i class="fa  fa-calendar white-bg"></i>

            <span class="title">Planning de la salle</span></a>
          </div>
        </div> -->
         
        
             
      
      </div><!--/.row-->  
     

      <div class="row">   
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-table red"></i><span class="break"></span><strong>Toutes mes demandes de documents</strong></h2>
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
                    <th>Solliciteur</th>
                    <th>libelle</th>
                    <th>Details</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
            </thead>
            <tbody id = "test">
              @foreach ($document as $document)
                  <tr>
                   
                    <td>{{nom_user($document->id_user)}}</td>
                    <td>{{$document->sujet}}</td>
                    <td>{{$document->description}}</td>
                    <td>Demande document</td>
                  <td>
                    <?php if ($document->statut==0): ?>
                      <span class="label label-warning">En Cours</span>
                    <?php elseif ($document->statut==1): ?>
                      <span class="label label-info" >Repondue</span>
                    <?php elseif ($document->statut==2): ?>
                      <span class="label label-danger">Annulée</span>
                    <?php endif ?>
                    
                  </td>
                  <td>
                     <?php if ($document->document_user!=""): ?>
               <a class="btn btn-warning" target="_blank" href="{{ asset('document/demande_document/'.$document->document_user.'')}}" download title="Voir le fichier joint" data-rel="tooltip">
                      <i class="fa fa-file"></i>                                            
                    </a>
            <?php endif ?>
                     <?php if ($document->statut==0): ?>
              
                       <a class="btn btn-info" href="{{ route ('DemandeDocument.edit', $document->id)}}">
                      <i class="fa fa-edit " title="Modifier." data-rel="tooltip"></i>                                            
                    </a>

                      <a data-toggle="modal" data-target="#myModal{{$document->id}}" type="button" class="btn btn-default" href="#" title="Supprimer." data-rel="tooltip">
                      <i class="fa fa-trash-o "></i> 

                    </a>
            <?php endif ?>
                     
                    <a class="btn btn-success" href="{{ route ('DemandeDocument.show', $document->id)}}" title="Voir plus de details." data-rel="tooltip">
                      <i class="fa fa-search-plus "></i>                                            
                    </a>

                   

 

                 

                    <!-- Suppression -->

                    <div class="modal fade" id="myModal{{$document->id}}">
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
          <form action="{{ route ('DemandeDocument.update', $document->id)}}" method="post" >
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