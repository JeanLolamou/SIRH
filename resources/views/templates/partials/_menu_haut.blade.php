<div class="navbar" role="navigation">
	@if (Auth::guest())
                @else
                <style type="text/css">
                	#clearfix{
                		background: white;
                	}
                	.clearfix{
                		background: white;
                	}
                </style>
		<div class="container-fluid">		
			
			<ul class="nav navbar-nav navbar-actions navbar-left">
				<li class="visible-md visible-lg"><a href="#" id="main-menu-toggle"><i class="fa fa-th-large"></i></a></li>
				<li class="visible-xs visible-sm"><a href="#" id="sidebar-menu"><i class="fa fa-navicon"></i></a></li>			
			</ul>
			
			<form class="navbar-form navbar-left">
				<button type="submit" class="fa fa-search"></button>
				<input type="text" class="form-control" placeholder="Search..."></a>
			</form>
			
	        <ul class="nav navbar-nav navbar-right">
				<?php if (isset($notification)): ?>
					
				<li class="dropdown visible-md visible-lg">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i><span class="badge"><?php if ($notification->count()>0): ?>
	        			{{$notification->count()}}
	        		<?php endif ?></span></a>
	        		<ul class="dropdown-menu" style="">
						<li class="dropdown-menu-header">
							<strong>Notifications</strong>
							
						</li>
						<?php if ($notification->count()<=0): ?>
							 <li class="clearfix" style="">
							<i class="fa fa-bell-o"></i> 
                            <a href="#" class="notification-user">Aucune notification </a> 
                        </li>
						<?php endif ?>
						 @foreach ($notification as $notifications)		
						 <?php if ($notifications->type=="demande_conge"): ?>
						 		 <li class="clearfix" style="">
							<i class="fa fa-sun-o"></i> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-user">Demande Congé </a> <br>
                            <span class="notification-action"> {{$notifications->details}} </span><br> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-link"> Voir</a>
                        </li>				
						 <?php endif ?>		
						  <?php if ($notifications->type=="delegation"): ?>
						 		 <li class="clearfix">
							<i class="fa fa-exchange"></i> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-user">Delegation </a> <br>
                            <span class="notification-action"> {{$notifications->details}} </span><br> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-link"> Voir</a>
                        </li>				
						 <?php endif ?>	
						  <?php if ($notifications->type=="demande_document"): ?>
						 		 <li class="clearfix">
							<i class="fa fa-briefcase"></i> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-user">Demande documents </a> <br>
                            <span class="notification-action"> {{$notifications->details}} </span><br> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-link"> Voir</a>
                        </li>				
						 <?php endif ?>		

						 <?php if ($notifications->type=="demande_entretien"): ?>
						 		 <li class="clearfix">
							<i class="fa fa-ticket"></i> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-user">Demande entretiens </a> <br>
                            <span class="notification-action"> {{$notifications->details}} </span><br> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-link"> Voir</a>
                        </li>				
						 <?php endif ?>	
						  <?php if ($notifications->type=="suggestion"): ?>
						 		 <li class="clearfix">
							<i class="fa fa-file"></i> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-user">Suggestions </a> <br>
                            <span class="notification-action"> {{$notifications->details}} </span><br> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-link"> Voir</a>
                        </li>				
						 <?php endif ?>	

						   <?php if ($notifications->type=="demande_salle"): ?>
						 		 <li class="clearfix">
							<i class="fa fa-building-o"></i> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-user">Salle Reunion </a> <br>
                            <span class="notification-action"> {{$notifications->details}} </span><br> 
                            <a href="{{route('Notification.show',$notifications->id)}}" class="notification-link"> Voir</a>
                        </li>				
						 <?php endif ?>					
                       
                        @endforeach                  
						
	        		</ul>
	      		</li>	
				<?php endif ?>
				
				<li class="dropdown visible-md visible-lg">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="user-avatar" src="{{ asset('images/profil/'.Auth::user()->photo.'')}}" alt="user-mail">{{ Auth::user()->name }} {{ Auth::user()->prenom }}</a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header">
							<strong>Compte</strong>
						</li>						
						<li><a href="{{route('profil')}}"><i class="fa fa-user"></i> Profil</a></li>
						<li><a href="{{route('document')}}"><i class="fa fa-file"></i> Document</a></li>
						<li class="divider"></li>						
						<li><a href="{{ route('logout') }}" onclick="event.preventDefault();             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Deconnexion</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>	
	        		</ul>
	      		</li>
				<li><a href="{{ route('logout') }}" onclick="event.preventDefault();             document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i></a></li>
			</ul>
			
		</div>
		@endif
		
	</div>