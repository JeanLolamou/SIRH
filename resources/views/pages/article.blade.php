
     @extends('templates/default')
         @section('contenu')

       
     <!-- Css files -->
     

     
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa  fa-clipboard"></i>Article</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-bullhorn"></i><a href="{{route('actualite')}}">Actualite</a></li>
            <li><i class="fa fa-clipboard"></i>Article</li>       
          </ol>
        </div>
      </div>


      
      <div class="row">
        
        <div class="col-lg-8">
          @foreach ($actualites as $actualites)
          <div class="panel panel-default">
              <div class="panel-heading">
                 <img src="{{ asset('images/actualite/'.$actualites->image.'')}}" style="max-height: 400px;width: 100%;">
              <div><a><strong style="font-size: 20px;">{{$actualites->titre}}</strong></a></div>
              <div class="small"><i class="fa fa-clock-o"></i> {{(new DateTime($actualites->date_publier))->format("d/m/Y")}}</div>
                
              </div>
              <div class="panel-body">
                <blockquote>{!!$actualites->contenu!!}</blockquote>
             <!--  <div class="actions">
              <div class="btn-group">
                <button type="button" class="btn btn-link">Like</button>
                <button type="button" class="btn btn-link">Comment</button>
                <button type="button" class="btn btn-link">Share</button>                 
              </div>
              <div class="pull-right"><strong>2.596</strong> People liked this</div>
            </div> -->
            </div>
            <div class="panel-footer">
              <!-- <input type="email" class="form-control" placeholder="Write a comment..."> -->
            </div>
          </div>
          @endforeach
        </div><!--/col-->
       <div class="col-lg-4" style="background: white;">
        <h2>Actualité</h2>
         @foreach ($infos as $infos)
       <div class="col-md-12">
        <a href="{{ route ('Actualite.show', $infos->id_actualite)}}">
          <div class="panel panel-default">     
              <div class="panel-body" >                            
               <img src="{{ asset('images/actualite/'.$infos->image.'')}}" style="height: 100%;width: 100%;">
              </div>
            <div class="panel-footer">
               
              <div><a href="{{ route ('Actualite.show', $infos->id_actualite)}}"><strong>{{substr($infos->titre,0,40)}}..<i class="fa fa-search-plus" style="font-size: 25px;"></i></strong></a></div>
              <div class="small"><i class="fa fa-clock-o"></i> {{(new DateTime($infos->date_publier))->format("d/m/Y")}}</div>
              
            </div>
          </div>
          </a>
       </div>
        @endforeach
       </div>
      </div><!--/row-->
     
  
 
  
  
  
@stop