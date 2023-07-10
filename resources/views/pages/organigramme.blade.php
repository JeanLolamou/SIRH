
     @extends('templates/default')
         @section('contenu')
     <!-- Css files -->
    

     
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-sitemap"></i>Organigramme</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-sitemap"></i>Organigramme</li>       
          </ol>
        </div>
      </div>

       <div class="row">
        @foreach ($organigramme as $organigramme)

        <?php if (Auth::user()->id_role==3): ?>
           <div class="col-md-5 col-sm-5 col-xs-6 col-xxs-12">
          <div class="smallstat red-bg">
            <a href="#" data-toggle="modal" data-target="#entretien"><i class="fa fa-plus white-bg"></i>

            <span class="title">Changer l'organigramme</span></a>
          </div><!--/.smallstat-->
        </div><!--/.col-->

         <!-- Entretien -->

                    <div class="modal fade" id="entretien">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Démande d'entretiens</h4>
        </div>
        <div class="modal-body">
          <p>   <form action="{{ route ('Organigramme.update', $organigramme->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}
             
                       <div class="form-group">
                             <label for="direction-w1">Changer l'organigramme</label>
                          <input type="file" name="image" class="form-control">
                        </div>

                         

            </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          <button class="btn btn-primary" type=" button submit"><i class="fa fa-trash"></i> VALIDER</button>
                        <input type="hidden" name="modif_role" value="0">
          </form>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
        <?php endif ?>
       
        
             
      
      </div><!--/.row-->  
      
      <div class="row">
         <div class="row">
       
       <div class="col-md-12">
        
          <div class="panel panel-default">     
              <div class="panel-body" >                            
               <img src="{{ asset('images/organigramme/'.$organigramme->image.'')}}" style="height: 100%;width: 100%;">
              </div>
           
          </div>
       </div>
        @endforeach
      </div><!--/row-->
      </div><!--/row-->
     
  
  
    
 
 
  
  
  
@stop