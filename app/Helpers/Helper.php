<?php 

use Illuminate\Support\Facades\DB;
use App\Notification;

if (! function_exists('active_route')) {
	function active_route($route){

		return Route::is($route) ? 'active opened' : '';


	}
}

if (! function_exists('opened')) {
	function opened($route){

		return Route::is($route) ? 'opened' : '';


	}
}

if (! function_exists('nom_direction')) {
	function nom_direction($id){
		$nom="";
		 $directions =DB::table('directions')
        ->select('nom')        
        ->where('id','=', $id)
        ->get();
        foreach ($directions as $directions) {
        	$nom=$directions->nom;
        }

		return $nom;


	}
	}

	if (! function_exists('user_direction')) {
	function user_direction($id){
		$id=1;
		 $directions=DB::table('users')        
        ->where('id','=', $id)
        ->get();
        foreach ($directions as $directions) {
        	$id=$directions->id_direction;
        }

		return $id;


	}
	}

	if (! function_exists('nom_salle')) {
	function nom_salle($id){
		$nom="";
		 $salle =DB::table('typesalles')       
        ->where('id','=', $id)
        ->get();
        foreach ($salle as $salles) {
        	$nom=$salles->nom;
        }

		return $nom;


	}
	}

		if (! function_exists('nom_vehicule')) {
	function nom_vehicule($id){
		$nom="";
		 $salle =DB::table('vehicules')       
        ->where('id','=', $id)
        ->get();
        foreach ($salle as $salles) {
        	$nom=$salles->nom;
        }

		return $nom;


	}
	}

	if (! function_exists('nom_user')) {
	function nom_user($id){
		$nom="";
		 $user =DB::table('users')       
        ->where('id','=', $id)
        ->get();
        foreach ($user as $user) {
        	$nom=$user->prenom.' '.$user->name;
        }

		return $nom;


	}
	}

	if (! function_exists('type_conge')) {
	function type_conge($id){
		$nom="";
		 $type_conge =DB::table('typesconges')
        ->select('libelle')        
        ->where('id','=', $id)
        ->get();
        foreach ($type_conge as $type_conge) {
        	$nom=$type_conge->libelle;
        }

		return $nom;


	}
	}

	if (! function_exists('photo')) {
	function photo($id){
		$photo="user.png";
		 $photo1 =DB::table('users')
        ->select('photo')        
        ->where('id','=', $id)
        ->get();
        foreach ($photo1 as $photo1) {
        	$photo=$photo1->photo;
        }

		return $photo;


	}
	}


	if (! function_exists('conge_pris')) {
	function conge_pris($id){
		$nb=0;
		 $nbr =DB::table('conges')       
        ->where([['id_user','=', $id],['type','=', 1]])
        ->get();
        foreach ($nbr as $nbr) {
        	$nb+=$nbr->nbrjours;
        }



		return $nb;


	}
	}


	if (! function_exists('salle_pris')) {
	function salle_pris($salle,$date,$heur_debut,$heur_fin){
		$pris=false;
		 $salle =DB::table('reunions') 
		->where('id_salle','=',$salle)   
        ->get();

        foreach ($salle as $salle) {
        	
        	if ($salle->date==$date) {
        	$d=new Datetime($heur_debut);
        	$f=new Datetime($heur_fin);
        	$n=new Datetime($salle->heur_debut);
        	$m=new Datetime($salle->heur_fin);

          if ( $d>=$n && $d <= $m){
               $pris=true;
             }elseif ($f >= $n && $f <= $m) {
             	$pris=true;
             }elseif ($heur_fin == $salle->heur_fin && $heur_debut == $salle->heur_debut) {
             	$pris=true;
             }else{
             	$pris=false;
             }
        	}
        }

       



		return $pris;


	}
	}

 
 if (! function_exists('vehicule_pris')) {
	function vehicule_pris($vehicule,$date,$heur_debut,$heur_fin){
		$pris=false;
		 $vehicule =DB::table('demandevehicules') 
		->where('id_vehicule','=',$vehicule)   
        ->get();

        foreach ($vehicule as $vehicule) {
        	
        	if ($vehicule->date==$date) {
        	$d=new Datetime($heur_debut);
        	$f=new Datetime($heur_fin);
        	$n=new Datetime($vehicule->heur_debut);
        	$m=new Datetime($vehicule->heur_fin);

          if ( $d>=$n && $d <= $m){
               $pris=true;
             }elseif ($f >= $n && $f <= $m) {
             	$pris=true;
             }elseif ($heur_fin == $vehicule->heur_fin && $heur_debut == $vehicule->heur_debut) {
             	$pris=true;
             }else{
             	$pris=false;
             }
        	}
        }

       



		return $pris;


	}
	}

	if (! function_exists('document_conge')) {
	function document_conge($id){
		$nom="";
		 $document =DB::table('documents')       
        ->where('id_conge','=', $id)
        ->get();
        foreach ($document as $document) {
        	$nom=$document->libelle;
        }



		return $nom;


	}
	}
   

   if (! function_exists('directeur')) {
	function directeur($id){
		
     $id_directeur=0;
		 $directions =DB::table('directions')       
        ->where('id','=', $id)
        ->get();
        foreach ($directions as $directions) {
        	$id_directeur=$directions->directeur;
        }



		return $id_directeur;


	}
	}



	if (! function_exists('deja_delegue')) {
	function deja_delegue($id_delegant,$id_delegue){
		
     $est_delegue=false;
		 $delegue =DB::table('delegations')       
        ->where([['id_delegue','=', $id_delegue],['id_delegant','=', $id_delegant],['supprimer',0]])
        ->get();
        foreach ($delegue as $delegue) {
        	$est_delegue=true;
        }



		return $est_delegue;


	}
	}



	if (! function_exists('notifier')) {
	function notifier($id_user,$details,$type){
		
     Notification::create(['id_user'=>$id_user, 'details'=>$details, 'type'=>$type, 'etat'=>0]);


	}
	}


	if (! function_exists('denotifier')) {
	function denotifier($id_role,$id_user,$type){
		
     
     Notification::where([['etat', '=', 0],['id_user', '=', $id_user],['type', '=', $type]])->update(['etat' => 1]);

      if ($id_role==3) {
      Notification::where([['etat', '=', 0],['id_user', '=', 0],['type', '=', $type]])->update(['etat' => 1]);
      }


	}
	}


		if (! function_exists('mail_user')) {
	function mail_user($id){
		$mail="";
		 $user =DB::table('users')       
        ->where('id','=', $id)
        ->get();
        foreach ($user as $user) {
        	$mail=$user->email;
        }

		return $mail;


	}
	}

	if (! function_exists('take_user')) {
	function take_user($id){
		 $user =DB::table('users')       
        ->where('id','=', $id)
        ->get();

		return $user;


	}
	}



	if (! function_exists('mail_rh')) {
	function mail_rh(){
		$mail="";
		 $user =DB::table('users')       
        ->where('id_role','=', 3)
        ->get();
        foreach ($user as $user) {
        	$mail=$user->email;
        }

		return $mail;


	}
	}


	if (! function_exists('id_rh')) {
	function id_rh(){
		 $user =DB::table('users')       
        ->where('id_role','=', 3)
        ->get();
        $id=0;
        foreach ($user as $user) {
        	$id=$user->id;
        }

		return $id;


	}
	}


	




 ?>