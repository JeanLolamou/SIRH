
     @extends('templates/default_ck')
         @section('contenu')

         <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
         <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
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
          <h3 class="page-header"><i class="fa fa-bullhorn"></i>Actualite</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-bullhorn"></i><a href="{{route('actualite')}}">Actualite</a></li>
            <li><i class="fa fa-plus"></i>Ajout actualité</li>       
          </ol>
        </div>
      </div>


      
      <div class="row">
        
        <div class="col-lg-12">
           <div class="panel panel-default">
                  <div class="panel-heading">
                      <h2><i class="fa fa-indent red"></i><strong>Nouvelle actualite</strong></h2>
                  </div>
                  <div class="panel-body">
             <form method="POST" action="{{ route ('Actualite.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                             <label for="direction-w1">Titre</label>
                          <input type="text" name="titre" class="form-control" required>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                            <label for="nf-password">Date</label>
                            <input type="date" id="nf-password" name="date_publier" class="form-control" placeholder="" required>
                        </div>
                        </div>
                        <div class="col-md-8">
                          <label>Image</label>
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
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="image"/ > <!-- rename it -->

                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 
                          </div>
                        </div>
                       
                         
                          <div class="form-group">
                            <label for="textarea-input">Contenu</label>
                            <div class="">
                                <textarea id="editor" name="contenu" rows="9"  placeholder="Contenu..." required>
                                  
                                </textarea>
                            </div>
                        </div>
                        
                    
            </div>
            <div class="panel-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> Publier</button>
                          <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Annuler</button>
                    </div>
              </div>
        </div><!--/col-->
      </form>
      </div><!--/row-->
     
  
     <script>
                        CKEDITOR.replace( 'editor' );
                </script>
    
 
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