@extends('templates/default')
         @section('contenu')
          @if($notification->isNotEmpty())
           <div class="row">
     <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Notification!</strong> Vous avez des nouvelles notifications.
              </div>
              </div>
                     @endif
           @if(session()->has('message'))
                      <div class="alert alert-success alert-dismissible" style="width: 100%;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Succés!</strong> {{session()->get('message')}}
</div>      
                                 
               @endif
  
          <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Bienvenue {{ Auth::user()->prenom }}</h3>
        
        </div>
      </div>
      
      <div class="row">
        <a href="{{route('demande_entretien')}}">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box red-bg" style="min-height: auto;">

            <div class="count">Entretien</div>
            <div class="title">Demande</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->
        </a>
        <a href="{{route('demande_document')}}">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box green-bg" style="min-height: auto;">
           <div class="count">Document</div>
            <div class="title">Demande</div>          
          </div><!--/.info-box-->     
        </div><!--/.col-->
        </a>
        <a href="{{route('annuaire')}}">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box blue-bg" style="min-height: auto;">
           <div class="count">Annuaire</div>
            <div class="title">APIP</div>       
          </div><!--/.info-box-->     
        </div><!--/.col-->
        </a>
        <a href="{{route('demande_conge')}}">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box magenta-bg" style="min-height: auto;">
           <div class="count">Congé</div>
            <div class="title">Demande</div>           
          </div><!--/.info-box-->     
        </div><!--/.col--> 
        </a>   
        
      </div><!--/.row-->
      
    <div class="row activity">
        
        <div class="col-md-6">
          <form method="POST" action="{{ route ('Suggestion.store')}}" enctype="multipart/form-data">
                        @csrf
          <div class="panel panel-default">           
              <div class="panel-body">                            
                <input name="suggestion" type="text" class="form-control" placeholder="faites vos suggestions ici?">
              </div>
            <div class="panel-footer">
              <div class="btn-group">
                <button type="button" class="btn btn-link"><i class="fa fa-map-marker"></i></button>
                <!-- <button type="button" class="btn btn-link"><i class="fa fa-camera"></i></button>
                <button type="button" class="btn btn-link"><i class="fa fa-video-camera"></i></button>  -->               
              </div>
              
              <div class="pull-right">
                <button type="button submit" class="btn btn-primary">Envoyer</button>
              </div>  
            </div>
          </div> 
        </form>

          
           <div class="panel panel-default">
              <div class="panel-heading" style="height: auto;">
             <span style="font-size: 20px;color: blue;"><a href="#">Demande en attente</a></span>
              </div>
              <div class="panel-body">
                
              <div class="row">
                <table class="table">

                  <thead>
                <tr>
                  <th>Demande</th>
                  <th>Type</th>
                  <th>Date</th> 
                  <th>Etat</th>                                  
                </tr>
                  </thead>   
                  <tbody>
                    @foreach ($demandeentretien as $demandeentretien)
                  <tr>
                    <td>{{$demandeentretien->libelle}}</td>
                     <td>Entretien</td>
                    <td>{{(new DateTime($demandeentretien->date))->format("d-M-Y")}} {{$demandeentretien->heur}}</td>
                    <td>
                     <?php if ($demandeentretien->statut==0): ?>
                      <span class="label label-warning">En Cours</span>
                    <?php endif ?>
                    </td>                                       
                  </tr>
                  @endforeach  
                    @foreach ($demandedocument as $demandedocument)
                  <tr>
                    <td>{{$demandedocument->sujet}}</td>
                     <td>Document</td>
                    <td>{{(new DateTime($demandedocument->date))->format("d-M-Y")}}</td>
                    <td>
                     <?php if ($demandedocument->statut==0): ?>
                      <span class="label label-warning">En Cours</span>
                    <?php endif ?>
                    </td>                                       
                  </tr>
                  @endforeach 
                   @foreach ($demandeconge as $demandeconge)
                  <tr>
                    <td>{{$demandeconge->commentaire}}</td>
                     <td>Conge</td>
                    <td>{{(new DateTime($demandeconge->date_debut))->format("d-M-Y")}} {{(new DateTime($demandeconge->date_fin))->format("d-M-Y")}}</td>
                    <td>
                     <?php if ($demandeconge->statut==0): ?>
                      <span class="label label-warning">En Cours</span>
                    <?php endif ?>
                    </td>                                       
                  </tr>
                  @endforeach                                                  
                  </tbody>
               </table>              
               
                
              </div><!--/.row-->
             
          
              </div>
           
          </div>          
          
          <div class="panel panel-default">
              <div class="panel-heading" style="background: white;">
                <span style="font-size: 20px;color: blue;"><a>Annuaire APIP</a></span>
              </div>
            
              <div class="panel-footer" style="height: 600px;
    overflow-y: scroll;">                        
              @foreach ($annuaire as $annuaire)
              <div class="media" style="border-bottom: 1px solid grey;">
                  <a class="pull-left" href="#">
                    <img class="media-object img-rounded" src="{{ asset('images/profil/'.photo($annuaire->id).'')}}">
                  </a>
                  <div class="media-body">
                  <div class="pull-right small">{{$annuaire->poste}}</div>
                  <a href="#">
                    <div class="media-heading">
                      <strong>{{$annuaire->name}} {{$annuaire->prenom}}</strong>
                    </div>
                  </a>
                    <p>{{$annuaire->email}}</p>         
                    <p>{{$annuaire->tel}}</p>
                    <p style="color: #79c447;">{{$annuaire->poste}}</p>                      
                  <a href="#">{{nom_direction($annuaire->id_direction)}}</a>        
                </div>
              </div> 
              @endforeach              
              </div>
           
          </div>

               
        </div><!--/.col-->
        
        
        <div class="col-md-6">
          <div class="panel panel-default">
              <div class="panel-heading" style="height: auto;">
             <span style="font-size: 20px;color: blue;"><a href="{{route('actualite')}}">Actualite</a></span>
              </div>
              <div class="panel-body">
                
              <div class="row">
                @foreach ($actualites as $actualite)
                <div class="col-lg-4 col-md-6 col-xs-12">
                   <a href="{{ route ('Actualite.show', $actualite->id_actualite)}}">
                <img class="img-responsive" src="{{ asset('images/actualite/'.$actualite->image.'')}}" style="height: 200px;width: 100%;">
                {{substr($actualite->titre,0,40)}}..
                </div><!--/.col-->
                @endforeach
               
                
              </div><!--/.row-->
             
          
              </div>
           
          </div>          
          
          <div class="row">
            <div class="col-md-7">

              <div class="panel panel-default">
              <div class="panel-heading" style="height: auto;">
             <span style="font-size: 30px;color: blue;"><a href="#">Documents utiles</a></span>
              </div>
              <div class="panel-body" style="height: 600px;
    overflow-y: scroll;">
                
              <div class="row">
                  <table class="table">

                    
                  <tbody>
                   
                    @foreach ($documentpartage as $documentpartage)
                  <tr>
                    <td>
                        
                       <a class="btn" target="_blank" href="{{ asset('document/document_partager/'.$documentpartage->libelle.'')}}" download title="Voir le document" data-rel="tooltip">
                      <img class="img-profile" src="{{ asset('img/fichier.png')}}" style="max-height: 50px;max-width: 50px;">                                
                    </a>
                  </td>
                    <td>
                      {{$documentpartage->details}}
                    </td>
                                                         
                  </tr>
                  @endforeach                                               
                  </tbody>
               </table>    
                
              </div><!--/.row-->
             
          
              </div>
           
          </div> 
                     
            </div>
            <div class="col-md-5">
              <div class="panel default">
              <div class="panel-heading">
             <span style="font-size: 20px;color: blue;"><a href="#">APIP</a></span>
              </div>
              <div class="panel-body" style="height: 600px;
    overflow-y: scroll;">
                
                <a class="twitter-timeline" href="https://twitter.com/APIP_Guinee?ref_src=twsrc%5Etfw">Tweets by APIP_Guinee</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
             
              
            </div>                  
              
             
          </div>
            </div>
            
          </div>
          
        </div><!--/.col-->
        
      </div><!--/.row-->
      
         @stop