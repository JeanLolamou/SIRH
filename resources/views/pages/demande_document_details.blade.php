@extends('templates/default')
         @section('contenu')

         

  <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-file"></i> DETAILS</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><a href="{{route('demande_document')}}"><i class="fa fa-suitcase"></i>Demande de document</a></li>  
            <li><i class="fa fa-file"></i>Details</li>                
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
                            <h2><i class="fa fa-file red"></i><strong>Details</strong></h2>
                        </div>
                        <div class="panel-body">
                           <form action="{{ route ('DemandeDocument.update', $document->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="modif" value="1">

                               <div class="form-group">
                             <label for="direction-w1">Sujet</label>
                          <input name="libelle" type="text" class="form-control" id="daterange" value="{{$document->sujet}}" disabled="">
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                          <div class="form-group">
                  <label class="control-label" for="daterange">Date</label>
                  <div class="controls">
                  <div class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input name="date" type="date" class="form-control" id="daterange" value="{{$document->date}}" disabled="">
                  </div>
                  </div>
                </div>
                        </div>
                          <div class="col-md-4">
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
                        <div class="col-md-4">
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
                  <textarea name="description"  id="limit" class="form-control" rows="6" style="width:100%" disabled="">
                    {{$document->description}}
                  </textarea>
                  </div>
                </div>   

                <?php if ($document->statut!=0): ?>
                      <div class="form-group">
                  <label class="control-label" for="textarea2">Reponse </label>
                  <div class="controls">
                  <textarea name="description"  id="limit" class="form-control" rows="6" style="width:100%" disabled="">
                    {{$document->reponse}}
                  </textarea>
                  </div>
                </div>  
                @endif
                <div class="row">
                  <div class="col-md-12">
                     <label class="control-label" for="textarea2">Fichier de reponse</label>
                  </div>
                   <?php $a=0; ?>
                    @foreach ($fichier as $fichier)
                    <?php $a++; ?>
                  <div class="col-md-2">
                   
                     <a class="btn" target="_blank" href="{{ asset('document/demande_document/'.$fichier->libelle.'')}}" download title="Voir le fichier" data-rel="tooltip">
                      <img class="img-profile" src="{{ asset('img/fichier.png')}}" style="max-height: 50px;max-width: 50px;"> 
                      Fichier <?php echo $a; ?>                                 
                    </a>
                       
                  </div>
                  @endforeach
                </div>
                    
                    
                                
                                        
                            </form>
                        </div>
                    </div>
          
        </div><!--/.col-->
      
      </div><!--/.row profile-->  


   

      @endforeach
         @stop