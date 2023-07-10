<div class="sidebar ">
	<style type="text/css">
		#style-1::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: grey;
}

#style-1::-webkit-scrollbar
{
	width: 12px;
	background-color: black;
}

#style-1::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #555;
}
	</style>
								
				<div class="sidebar-collapse">
					<div class="sidebar-header t-center">
                        <span><img class="text-logo" src="{{asset('img/logo1.png')}} "><i class="fa fa-space-shuttle fa-3x blue"></i></span>
                    </div>										
					<div class="sidebar-menu" id="style-1"  style="height: 600px  !important;">
						<ul class="nav nav-sidebar" id="style-1" style="max-width: 500px;overflow-y: scroll;">
							<li><a href="{{route('home')}}"><i class="fa fa-laptop"></i><span class="text"> Tableau de bord</span></a></li>
							<!-- <li>
								<a href="#"><i class="fa fa-file-text"></i><span class="text"> Retenir</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									<li><a href="page-activity.html"><i class="fa fa-car"></i><span class="text"> Activity</span></a></li>
								</ul>	
							</li> -->
							<li>
								<a href="#"><i class="fa fa-folder"></i><span class="text">Administrer </span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									<li class="{{active_route('demande_conge')}}{{active_route('etat_conge')}}{{active_route('planning_conge')}}{{active_route('liste_all_conge')}}{{active_route('Conge.create')}}{{active_route('Conge.show')}}{{active_route('Conge.edit')}}{{active_route('Conge.update')}}">
										<a href="{{route('demande_conge')}}"><i class="fa  fa-sun-o"></i><span class="text"> Demande de congés</span></a>
									</li>
									<?php if (Auth::user()->id_role!=1): ?>
										<li class="{{active_route('demande_salle')}}{{active_route('Reunion.create')}}{{active_route('Reunion.show')}}{{active_route('Reunion.edit')}}{{active_route('Reunion.update')}}">
										<a href="{{route('demande_salle')}}"><i class="fa fa-building-o"></i><span class="text"> Demande salle reunion</span></a>
									</li>
									
									<?php endif ?>
									<?php if ((Auth::user()->id_role!=1)or(Auth::user()->islogistique==1)): ?>
									<li class="{{active_route('demande_vehicule')}}{{active_route('Demandevehicule.create')}}{{active_route('Demandevehicule.show')}}{{active_route('Demandevehicule.edit')}}{{active_route('Demandevehicule.update')}}">
										<a href="{{route('demande_vehicule')}}"><i class="fa fa-car"></i><span class="text"> Réservation vehicule</span></a>
									</li>
									<?php endif ?>
									<li class="{{active_route('demande_entretien')}}{{active_route('DemandeEntretien.create')}}{{active_route('DemandeEntretien.show')}}{{active_route('DemandeEntretien.edit')}}{{active_route('DemandeEntretien.update')}}">
										<a href="{{route('demande_entretien')}}"><i class="fa fa-ticket"></i><span class="text"> Demande entretien</span></a>
									</li>
									
									<li class="{{active_route('demande_document')}}{{active_route('DemandeDocument.create')}}{{active_route('DemandeDocument.show')}}{{active_route('DemandeDocument.edit')}}{{active_route('DemandeDocument.update')}}">
										<a href="{{route('demande_document')}}"><i class="fa fa-suitcase"></i><span class="text"> Demande de document</span></a>
									</li>
									
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-th-large"></i><span class="text">Portail </span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									<li class="{{active_route('document')}}{{active_route('Document.create')}}{{active_route('Document.show')}}{{active_route('Document.edit')}}{{active_route('Document.update')}}">
										<a href="{{route('document')}}"><i class="fa fa-folder-open"></i><span class="text"> Mes documents</span></a>
									</li>
									<li class="{{active_route('actualite')}}{{active_route('Actualite.create')}}{{active_route('Actualite.show')}}{{active_route('Actualite.edit')}}{{active_route('Actualite.update')}}">
										<a href="{{route('actualite')}}"><i class="fa fa-bullhorn"></i><span class="text"> News</span></a>
									</li>
										<li class="{{active_route('annuaire')}}">
										<a href="{{route('annuaire')}}"><i class="fa fa-list-alt"></i><span class="text"> Annuaire</span></a>
									</li>
									
								</ul>
							</li>
						
							<!-- <li>
								<a href="#"><i class="fa fa-signal"></i><span class="text">Network</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									
									
								</ul>
							</li> -->
							<li>
								<a href="#"><i class="fa fa-briefcase"></i><span class="text"> Organiser</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
										<li class="{{active_route('organigramme')}}">
										<a href="{{route('organigramme')}}"><i class="fa fa-sitemap"></i><span class="text"> Organigramme</span></a>
									</li>
					
								</ul>
							</li>
							<?php if (Auth::user()->id_role==3): ?>
								<li class="{{active_route('personnel')}}{{active_route('inscription')}}{{active_route('User.create')}}{{active_route('User.show')}}{{active_route('User.edit')}}{{active_route('User.update')}}">
								<a href="{{route('personnel')}}"><i class="fa fa-users"></i><span class="text"> Personnel</span></a>
								
							</li>
							
							<?php endif ?>
							
								<li>
								<a href="#"><i class="fa fa-user"></i><span class="text"> Mon compte</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
										<li class="{{active_route('profil')}}">
										<a href="{{route('profil')}}"><i class="fa fa-user"></i><span class="text"> Profil</span></a>
									</li>
					
								</ul>
							</li>

							<?php if (Auth::user()->id_role==3): ?>
								<li>
								<a href="#"><i class="fa fa-cogs"></i><span class="text"> Parametres</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
								<li class="{{active_route('suggestion')}}">
								   <a href="{{route('suggestion')}}"><i class="fa fa-archive"></i><span class="text">Suggestion</span></a>
								
							     </li>
								<li class="{{active_route('typeconge')}}">
										<a href="{{route('typeconge')}}"><i class="fa fa-plus"></i><span class="text"> Type conge</span></a>
								</li>
								<li class="{{active_route('direction')}}">
										<a href="{{route('direction')}}"><i class="fa fa-plus"></i><span class="text">Direction</span></a>
								</li>
								<li class="{{active_route('service')}}">
										<a href="{{route('service')}}"><i class="fa fa-plus"></i><span class="text">Service</span></a>
								</li>
								<li class="{{active_route('typesalle')}}">
										<a href="{{route('typesalle')}}"><i class="fa fa-plus"></i><span class="text"> Type salle</span></a>
								</li>
					
								</ul>
							</li>
							<?php endif ?>
							
						</ul>
					</div>					
				</div>
				
				
			</div>