@extends('templates/default')
         @section('contenu')

         

 <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-edit"></i> Modification</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-building-o"></i><a href="{{route('direction')}}">Direction</a></li>   
            <li><i class="fa fa-edit"></i>Modification</li>              
          </ol>
        </div>
      </div>

@foreach ($direction as $direction)

<div class="row">
        

      <div class="row profile">
        
        
        <div class="col-md-8">
        
                    <div class="panel panel-default">                               
                        <div class="panel-heading">
                            <h2><i class="fa fa-edit red"></i><strong>Modification</strong></h2>
                        </div>
                        <div class="panel-body">
                           <form action="{{ route ('Direction.update', $direction->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="modif" value="1">

                               <div class="form-group">
                             <label for="direction-w1">Nom</label>
                          <input name="nom" type="text" class="form-control" id="daterange" value="{{$direction->nom}}">
                        </div>  

                          <div class="form-group">
                             <label for="direction-w1">Directeur</label>
                          <select class="form-control" name="directeur">
                            @foreach ($personnel as $personnel)
                             <?php if ($personnel->id==$direction->directeur): ?>
                            <option value="{{$personnel->id}}" selected>{{$personnel->name}} {{$personnel->prenom}}</option>
                            <?php else: ?>
                            <option value="{{$personnel->id}}" >{{$personnel->name}} {{$personnel->prenom}}</option>
                            <?php endif ?>
                           @endforeach
                           <option value="0" >----------</option>
                          </select>
                        </div>                   

                           

                <div class="form-group">
                  <label class="control-label" for="textarea2">Description</label>
                  <div class="controls">
                  <textarea name="description"  id="limit" class="form-control" rows="6" style="width:100%">
                    {{$direction->description}}
                  </textarea>
                  </div>
                </div>
                              
                              
                       
                              <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>          
                                
                                        
                            </form>
                        </div>
                    </div>
          
        </div><!--/.col-->
      
      </div><!--/.row profile-->  


   

      @endforeach
         @stop