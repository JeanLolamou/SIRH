@extends('templates/default')
         @section('contenu')

         

  <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-edit"></i> MODIFICATION</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><a href="{{route('demande_document')}}"><i class="fa fa-suitcase"></i>Demande de document</a></li>  
            <li><i class="fa fa-edit"></i>Modification</li>                
          </ol>
        </div>
      </div>

@foreach ($document as $document)

<div class="row">
        

      <div class="row profile">
        
        <div class="col-md-4">
          
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="text-center">
                <img class="img-profile" src="{{ asset('images/profil/'.photo($document->id_user).'')}}" style="max-height: 100px;max-width: 100px;">
              </div>
              
              <h3 class="text-center"><strong>{{nom_user($document->id_user)}}</strong></h3>
             
              
              <hr>
              
                
              
              
              
            </div>  
            
          </div>
        
        </div><!--/.col-->
        
        <div class="col-md-8">
        
                    <div class="panel panel-default">                               
                        <div class="panel-heading">
                            <h2><i class="fa fa-edit red"></i><strong>Modification</strong></h2>
                        </div>
                        <div class="panel-body">
                           <form action="{{ route ('DemandeDocument.update', $document->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="modif" value="1">

                               <div class="form-group">
                             <label for="direction-w1">Sujet</label>
                          <input name="sujet" type="text" class="form-control" id="daterange" value="{{$document->sujet}}" >
                        </div>

                        <div class="row">
                         
                          <div class="col-md-3">
                          <div class="form-group">
                  <label class="control-label" for="daterange">Statut</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                    <?php if ($document->statut==0): ?>
                      <span class="label label-warning">En Cours</span>
                    <?php elseif ($document->statut==1): ?>
                      <span class="label label-info" >Repondue</span>
                    <?php elseif ($document->statut==2): ?>
                      <span class="label label-danger">Annulée</span>
                    <?php endif ?>
                  </div>
                  </div>
                </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                  <label class="control-label" for="daterange">Fichier Joint</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                    <?php if ($document->document_user!=""): ?>
               <a class="btn " target="_blank" href="{{ asset('document/demande_document/'.$document->document_user.'')}}" download title="Voir le fichier joint" data-rel="tooltip">
                       <img class="img-profile" src="{{ asset('img/fichier3.jpg')}}" style="max-height: 50px;max-width: 50px;">                                           
                    </a>
            <?php endif ?>
                  </div>
                  </div>
                </div>
                        </div>
                         
                        </div>

                       

                              

                <div class="form-group">
                  <label class="control-label" for="textarea2">Commentaire</label>
                  <div class="controls">
                  <textarea name="description"  id="limit" class="form-control" rows="6" style="width:100%" >
                    {{$document->description}}
                  </textarea>
                  </div>
                </div>   
               
                    
                    
                                
                                        
                            
                        </div>
                         <div class="panel-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> Modifier</button>
                          <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Annuler</button>
                    </div>
                    </div>
                    </form>
        </div><!--/.col-->
      
      </div><!--/.row profile-->  


   

      @endforeach
         @stop