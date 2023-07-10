
     @extends('templates/default')
         @section('contenu')
     <!-- Css files -->
     

     
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-bullhorn"></i>Actualite</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-bullhorn"></i>Actualite</li>       
          </ol>
        </div>
      </div>

       <div class="row">
        <?php if (Auth::user()->id_role==3): ?>
          <div class="col-md-3  col-sm-3 col-xs-6 col-xxs-12">
          <div class="smallstat red-bg">
            <a href="{{route('Actualite.create')}}"><i class="fa fa-plus white-bg"></i>

            <span class="title">Nouvelle actualité</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->
        <?php endif ?>
        
         
        
             
      
      </div><!--/.row-->  
      
      <div class="row">
         @foreach ($actualites as $actualites)
       <div class="col-md-4">
        <a href="{{ route ('Actualite.show', $actualites->id_actualite)}}">
          <div class="panel panel-default">     
              <div class="panel-body" >                            
               <img src="{{ asset('images/actualite/'.$actualites->image.'')}}" style="height: 200px;width: 100%;">
              </div>
            <div class="panel-footer">
               
              <div><a href="{{ route ('Actualite.show', $actualites->id_actualite)}}"><strong>{{substr($actualites->titre,0,40)}}..<i class="fa fa-search-plus" style="font-size: 25px;"></i></strong></a></div>
              <div class="small"><i class="fa fa-clock-o"></i> {{(new DateTime($actualites->date_publier))->format("d/m/Y")}}</div>
              <?php if (Auth::user()->id_role==3): ?>
                <a data-toggle="modal" data-target="#myModal{{$actualites->id_actualite}}" type="button" class="btn btn-danger" href="#" title="Suppression" data-rel="tooltip"><i class="fa fa-trash-o"></i></a>

                <!-- Suppression -->

                    <div class="modal fade" id="myModal{{$actualites->id_actualite}}">
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
          <form action="{{ route ('Actualite.update', $actualites->id_actualite)}}" method="post" >
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
              <?php endif ?>
            </div>
          </div>
          </a>
       </div>
        @endforeach
      </div><!--/row-->
     
  
  
    
 
 
  
  
  
@stop