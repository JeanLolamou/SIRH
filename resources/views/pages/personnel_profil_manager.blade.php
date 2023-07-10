@extends('templates/default')
         @section('contenu')
         <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
         <style type="text/css">
           .container{
    margin-top:20px;
}
.image-preview-input {
    position: relative;
  overflow: hidden;
  margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
         </style>
        
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-user"></i>Profil</h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>  
             <li><i class="fa fa-user"></i>Profil</li>      
          </ol>
        </div>
      </div>

       @foreach ($personnel as $personnel)

       <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-plus-square-o red"></i><strong>Photo Profil</strong></h2>
              <div class="panel-actions">
                <a href="form-dropzone.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                <a href="form-dropzone.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="form-dropzone.html#" class="btn-close"><i class="fa fa-times"></i></a>
              </div>
            </div>
            <div class="panel-body">
              <form action="{{ route ('User.update', $personnel->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}
              <div class="row">    
        <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">  
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="fa fa-times"></span> Annuler
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="fa fa-folder-open"></span>
                        <span class="image-preview-input-title">Choisir</span>
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="image"/ required> <!-- rename it -->

                    </div>
                    <input type="hidden" name="modif" value="0">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 
        </div>
    </div>       
</form>
            </div>
          </div>
        </div><!--/col-->

      </div><!--/row-->

      <div class="row profile">
        
        <div class="col-md-5">
          
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="text-center">
                <img class="img-profile" src="{{ asset('images/profil/'.$personnel->photo.'')}}" style="max-width: 150px;max-height: 150px;">
              </div>
              <h3 class="text-center"><strong>{{$personnel->prenom}}</strong></h3>
              <h4 class="text-center"><small><i class="fa fa-map-marker"></i> {{nom_direction($personnel->id_direction)}}/ {{$personnel->poste}}</small></h4>
              
              <hr>
              
                <div class="text-center">
                   <li>
                 <?php if ($personnel->statut==0): ?>
                      <span class="label label-warning">En Création</span>
                    <?php elseif ($personnel->statut==1): ?>
                      <span class="label label-info" >Actif</span>
                    <?php elseif ($personnel->statut==2): ?>
                      <span class="label label-danger">Inactif</span>
                    <?php endif ?>             
                </li>           
                </div>
            
              
              <hr>
              
              <div class="row text-center">
                <div class="col-xs-4">
                  <div><strong>{{$personnel->tel}}</strong></div>
                  <div><small>Mobile</small></div> 
                </div><!--/.col-->
                <div class="col-xs-4">
                  <div><strong>{{$personnel->email}}</strong></div>
                  <div><small>E-mail</small></div>
                </div><!--/.col-->
              
              </div><!--/.row-->          
              
              <hr>
              
              <h4><strong>Information</strong></h4>
              
              <ul class="profile-details">
                <li>
                  <div><i class="fa fa-thumbs-up"></i> Poste</div>
                  {{$personnel->poste}}
                </li>
                <li>
                  <div><i class="fa fa-building-o"></i> Direction</div>
                 {{nom_direction($personnel->id_direction)}}
                </li>
              </ul>
              
              <hr>    

              <h4><strong>Contact</strong></h4>

              <ul class="profile-details">
                <li>
                  <div><i class="fa fa-phone"></i> Phone</div>
                 {{$personnel->tel}}
                </li>
                <li>
                  <div><i class="fa fa-tablet"></i> Numero Urgence</div>
                  {{$personnel->tel_urgence}}
                </li>
                <li>
                  <div><i class="fa fa-envelope"></i> E-mail</div>
                  {{$personnel->email}}
                </li>
                <li>
                  <div><i class="fa fa-map-marker"></i> adresse</div>
                  {{$personnel->adresse}}<br/>                 
                </li>
              </ul> 
              
            </div>  
            
          </div>
        
        </div><!--/.col-->
        
        <div class="col-md-7">
        
                    <div class="panel panel-default">                               
                        <div class="panel-heading">
                            <h2><i class="fa fa-heart-o red"></i><strong>Update info</strong></h2>
                        </div>
                        <div class="panel-body">
                           <form action="{{ route ('User.update', $personnel->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="modif" value="1">
                                <div class="form-group">
                                    <label class="control-label">Nom</label>
                                    <input name="name" type="text" class="form-control" value="{{$personnel->name}}" >
                                     
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Prenom</label>
                                    <input name="prenom" type="text" class="form-control" value="{{$personnel->prenom}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input name="email" type="email" class="form-control" value="{{$personnel->email}}">
                                </div>
                <div class="form-group">
                                    <label class="control-label">Adresse</label>
                                    <input name="adresse" type="text" class="form-control" value="{{$personnel->adresse}}">
                                </div>
                                <div class="form-group">
                                   <label class="control-label">Telephone</label>
                                    <input name="tel" type="text" class="form-control" value="{{$personnel->tel}}">
                                </div>
                             
                       
                              <div class="form-group">
                                   <label class="control-label">Numero Urgence</label>
                                    <input name="tel_urgence" type="text" class="form-control" value="{{$personnel->tel_urgence}}">
                                </div>

                              
                                        
                                <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>

                                 <div class="form-group pull-left">
                                    <a href="#" data-toggle="modal" data-target="#pass" class="btn btn-danger">Modifier le mot de pass?</a>
                                </div>

                                
                                        
                            </form>
                        </div>
                    </div>


                     <!-- Mot de pass -->

                    <div class="modal fade" id="pass">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Mot de pass</h4>
        </div>
        <div class="modal-body">
          <p>   <form action="{{ route ('User.update', $personnel->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
            {{ csrf_field() }}
                        {{ method_field('PUT') }}
                         <div class="form-group">
                             <label for="direction-w1">Nouveau mot de pass</label>
                          <input type="password" name="pass" class="form-control" placeholder="Mot de pass" required="">
                          
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


                      <div class="panel panel-default">                               
                        <div class="panel-heading">
                            <h2><i class="fa fa-heart-o red"></i><strong>Documents professionnels</strong></h2>
                        </div>
                        <div class="panel-body">
                           <div class="row">
                  <div class="col-md-12">
                    
                  </div>
                   <?php $a=0; ?>
                    @foreach ($fichier as $fichier)
                  <div class="col-md-2">
                   
                     <a class="btn" target="_blank" href="{{ asset('document/document_profession/'.$fichier->libelle.'')}}" download title="Voir le fichier" data-rel="tooltip">
                      <img class="img-profile" src="{{ asset('img/fichier.png')}}" style="max-height: 50px;max-width: 50px;"> <br>
                      {{$fichier->details}}                                
                    </a>
                       
                  </div>
                  @endforeach
                </div>
                        </div>
                    </div>
          
        </div><!--/.col-->
      
      </div><!--/.row profile-->    
      @endforeach
       <script type="text/javascript">
        $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
      </script>
         @stop