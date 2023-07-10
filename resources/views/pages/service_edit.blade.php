@extends('templates/default')
         @section('contenu')

         

 <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-edit"></i> Modification</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
            <li><i class="fa fa-building-o"></i><a href="{{route('service')}}">Service</a></li>   
            <li><i class="fa fa-edit"></i>Modification</li>              
          </ol>
        </div>
      </div>

@foreach ($service as $service)

<div class="row">
        

      <div class="row profile">
        
        
        <div class="col-md-8">
        
                    <div class="panel panel-default">                               
                        <div class="panel-heading">
                            <h2><i class="fa fa-edit red"></i><strong>Modification</strong></h2>
                        </div>
                        <div class="panel-body">
                           <form action="{{ route ('Service.update', $service->id)}}" method="post" enctype="multipart/form-data" class="form-vertical hover-stripped" role="form">
                       {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="modif" value="1">

                               <div class="form-group">
                             <label for="direction-w1">Nom</label>
                          <input name="nom" type="text" class="form-control" id="daterange" value="{{$service->nom}}">
                        </div>  

                          <div class="form-group">
                             <label for="direction-w1">Direction</label>
                          <select class="form-control" name="id_direction">
                            @foreach ($direction as $direction)
                             <?php if ($direction->id==$service->id_direction): ?>
                            <option value="{{$direction->id}}" selected>{{$direction->nom}}</option>
                            <?php else: ?>
                            <option value="{{$direction->id}}" >{{$direction->nom}}</option>
                            <?php endif ?>
                           @endforeach
                          </select>
                        </div>   

                          <div class="form-group">
                             <label for="direction-w1">Responsable</label>
                          <select class="form-control" name="responsable">
                            @foreach ($personnel as $personnel)
                             <?php if ($personnel->id==$service->responsable): ?>
                            <option value="{{$personnel->id}}" selected>{{$personnel->name}} {{$personnel->prenom}}</option>
                            <?php else: ?>
                            <option value="{{$personnel->id}}" >{{$personnel->name}} {{$personnel->prenom}}</option>
                            <?php endif ?>
                           @endforeach
                          </select>
                        </div>                   

                           

                <div class="form-group">
                  <label class="control-label" for="textarea2">Description</label>
                  <div class="controls">
                  <textarea name="description"  id="limit" class="form-control" rows="6" style="width:100%">
                    {{$service->description}}
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