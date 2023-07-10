@extends('templates/default')
         @section('contenu')
<div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-user"></i>Profil</h3>
          <ol class="breadcrumb">
             <li><i class="fa fa-home"></i><a href="{{route('home')}}">Accueil</a></li>
          <li><i class="fa fa-users"></i><a href="{{route('personnel')}}">Gestion personnel</a></li> <li><i class="fa fa-user"></i>Profil</li>       
          </ol>
        </div>
      </div>
   @foreach ($personnel as $personnel)
      <div class="row profile">
        
        <div class="col-md-12">
          
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="text-center">
                <img class="img-profile" src="{{ asset('images/profil/'.$personnel->photo.'')}}" style="max-width: 150px;max-height: 150px;">
              </div>
              
              <h3 class="text-center"><strong>{{$personnel->prenom}}</strong></h3>
              <h4 class="text-center"><small><i class="fa fa-brand"></i> {{$personnel->name}} / {{nom_direction($personnel->id_direction)}}</small></h4>
              
              <hr>
              
              
                <div class="text-center">               
                  <li><a href="{{ route ('User.edit', $personnel->id)}}" class="fa fa-edit blue-bg"></a></li>
                  <li>
                    Statut:
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
              
              
              <div class="row ">

                <div class="col-md-6" >
                 <h4><strong>General Information</strong></h4>
              
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
              </div>

            <div class="col-md-6" style="border-left: 1px solid grey;">
                <h4><strong>Contact Information</strong></h4>

              <ul class="profile-details">
                <li>
                  <div><i class="fa fa-phone"></i> Phone</div>
                  {{$personnel->tel}}
                </li>
                <li>
                  <div><i class="fa fa-tablet"></i> Numero d'urgence</div>
                  {{$personnel->tel_urgence}}
                </li>
                <li>
                  <div><i class="fa fa-envelope"></i> E-mail</div>
                  {{$personnel->email}}
                </li>
                <li>
                  <div><i class="fa fa-map-marker"></i> address</div>
                  {{$personnel->adresse}}                 
                </li>
              </ul> 
            </div>

                
              </div>        
              
                

            
              
            </div>  
            
          </div>
        
        </div><!--/.col-->
        
       
      </div><!--/.row profile-->  
      @endforeach
      
         @stop