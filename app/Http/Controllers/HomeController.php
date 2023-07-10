<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use auth;
use Mail;
use App\Mail\MailConge;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
      $delegation =DB::table('delegations')
         ->where('id_delegue',Auth::user()->id)
        ->get();
        if ($delegation->count()>0) {

          return view('pages.delegation_page',compact('delegation'));
        }else{
          return redirect()->route('accueil');
        }
         

         
    }

     public function gerer($id)
    {    
      

      $user = User::find($id);
    Auth::login($user);
       return redirect()->route('accueil');
          
    }

     public function accueil()
    {
      if (Auth::user()->statut!=1) {

          return view('pages.redirection');
         }else{

           $actualites =DB::table('actualites')
         ->where('supprimer',0)
        ->orderBY('id_actualite','DESC')
        ->simplePaginate(3);

         $demandeentretien =DB::table('entretiens')
        ->where([['supprimer',0],['id_user',Auth::user()->id],['statut',0]])
        ->orderBY('id','DESC')
        ->get();

          $demandedocument =DB::table('demandedocuments')
        ->where([['supprimer',0],['id_user',Auth::user()->id],['statut',0]])
        ->orderBY('id','DESC')
        ->get();

        $demandeconge =DB::table('conges')
        ->where([['id_user',Auth::user()->id],['supprimer',0],['statut',0]])
        ->orderBY('id','DESC')
        ->get();

         $annuaire =DB::table('users')
         ->where('statut',1)
        ->orderBY('name')
        ->get();

        $documentpartage =DB::table('documents')
         ->where([['supprimer',0],['type','partage']])
        ->orderBY('id','DESC')
        ->get();

        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        
        return view('pages.index',compact('actualites','demandeentretien','demandedocument','demandeconge','annuaire','documentpartage','notification'));

         }
    }

     public function direction()
    {  
        $direction =DB::table('directions')
         ->where('supprimer',0)
         ->orderBY('id')
        ->get();

        $personnel =DB::table('users')
         ->where([['id_role',2]])
         ->orderBY('name')
        ->get();

        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }

        
        return view('pages.direction',compact('direction','personnel','notification'));
        
    }


     public function service()
    {  
        $service =DB::table('services')
         ->where('supprimer',0)
         ->orderBY('id')
        ->get();

        $direction =DB::table('directions')
         ->where('supprimer',0)
         ->orderBY('id')
        ->get();

        $personnel =DB::table('users')
         ->where([['id_role',2]])
         ->orderBY('name')
        ->get();

        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }

        
        return view('pages.service',compact('service','direction','personnel','notification'));
        
    }

     public function typesalle()
    {  
        $typesalle =DB::table('typesalles')
         ->where('supprimer',0)
         ->orderBY('id')
        ->get();

        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }

        
        return view('pages.typesalle',compact('typesalle','notification'));
        
    }


     public function vehicules()
    {  
        $vehicules =DB::table('vehicules')
         ->where('supprimer',0)
         ->orderBY('id')
        ->get();

        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }

        
        return view('pages.vehicules',compact('vehicules','notification'));
        
    }

     public function typeconge()
    {  
        $typeconge =DB::table('typesconges')
         ->where('supprimer',0)
         ->orderBY('id')
        ->get();

        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }

        
        return view('pages.typeconge',compact('typeconge','notification'));
        
    }

     public function suggestion()
    {  
        $suggestion =DB::table('suggestions')
         ->where('supprimer',0)
         ->orderBY('id','DESC')
        ->get();

        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }

        
        return view('pages.suggestion',compact('suggestion','notification'));
        
    }

     public function profil()
    {  
        $personnel =DB::table('users')
         ->where('id',Auth::user()->id)
        ->get();

         $fichier = DB::table('documents')->where([['id_user',Auth::user()->id],['type','document_profession'],['supprimer',0]])->get();

         if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        return view('pages.personnel_profil_manager',compact('personnel','fichier','notification'));
        
    }

    public function organigramme()
    {  
        $organigramme =DB::table('organigrammes')
         ->where('id',1)
        ->get();

         if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        return view('pages.organigramme',compact('organigramme','notification'));
        
    }

    public function annuaire()
    {  
        $annuaire =DB::table('users')
         ->where('statut',1)
        ->orderBY('name')
        ->get();

         if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        return view('pages.annuaire',compact('annuaire','notification'));
        
    }

    public function actualite()
    {  
        $actualites =DB::table('actualites')
         ->where('supprimer',0)
        ->orderBY('id_actualite','DESC')
        ->get();

        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        return view('pages.actualite',compact('actualites','notification'));
        
    }

      public function documentpartage()
    {  
       if (Auth::user()->id_role==3) {
           $document =DB::table('documents')
         ->where([['supprimer',0],['type','partage']])
        ->orderBY('id','DESC')
        ->get();
       }else if (Auth::user()->id_role==2) {
           $document =DB::table('documents')
        ->where([['supprimer',0],['type','partage'],['confidentialite',0]])
        ->orWhere([['supprimer',0],['type','partage'],['confidentialite',1]])
        ->orderBY('id','DESC')
        ->get();
       }else if (Auth::user()->id_role==1) {
           $document =DB::table('documents')
         ->where([['supprimer',0],['type','partage'],['confidentialite',0]])
        ->orderBY('id','DESC')
        ->get();
       }

       if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        return view('pages.document_partage',compact('document','notification'));
    }


    public function document()
    {  
        if (Auth::user()->id_role==3) {
        $document =DB::table('documents')
         ->where([['supprimer',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

         if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }

        
        return view('pages.document',compact('document','notification'));
        }else{
        $document =DB::table('documents')
         ->where([['supprimer',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        return view('pages.document',compact('document','notification'));
        }
    }

    public function demande_entretien()
    {  
       denotifier(Auth::user()->id_role,Auth::user()->id,"demande_entretien");
        if (Auth::user()->id_role==3) {
            $demandeentretien =DB::table('entretiens')
        ->where([['supprimer',0],['id_responsable',Auth::user()->id]])
        ->orWhere([['supprimer',0],['id_responsable',0]])
        ->orderBY('id','DESC')
        ->get();
        $personnel =DB::table('users')->orderBY('id','DESC')->get();

        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        return view('pages.demande_entretien',compact('demandeentretien','personnel','notification'));
        }elseif(Auth::user()->id_role==2){
        $demandeentretien =DB::table('entretiens')
        ->where([['supprimer',0],['id_user',Auth::user()->id]])
        ->orWhere([['supprimer',0],['id_responsable',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();
        $personnel =DB::table('users')->where('id',Auth::user()->id)->get();

         if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        return view('pages.demande_entretien',compact('demandeentretien','personnel','notification'));
        }else{
        $demandeentretien =DB::table('entretiens')
        ->where([['supprimer',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();
        $personnel =DB::table('users')->where('id',Auth::user()->id)->get();

         if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        return view('pages.demande_entretien',compact('demandeentretien','personnel','notification'));
        }
    }

    public function demande_document()
    {  
       denotifier(Auth::user()->id_role,Auth::user()->id,"demande_document");

       if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }



        if (Auth::user()->id_role==3) {
            $document =DB::table('demandedocuments')
        ->where('supprimer',0)
        ->orderBY('id','DESC')
        ->get();

        return view('pages.demande_document',compact('document','notification'));
        }elseif (Auth::user()->id_role==2) {
             $document =DB::table('demandedocuments')
        ->where([['supprimer',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();
        return view('pages.demande_document_manager',compact('document','notification'));
        }else{

             $document =DB::table('demandedocuments')
        ->where([['supprimer',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();
        return view('pages.demande_document_manager',compact('document','notification'));

        }
    }

    public function planning_salle()
    {  
        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        if (Auth::user()->id_role==3 or Auth::user()->id_role==2) {
            $reunion =DB::table('reunions')
        ->where('supprimer',0)
        ->orderBY('id','DESC')
        ->get();
        return view('pages.salle_planning',compact('reunion','notification'));
        }
    }


     public function planning_vehicule()
    {  
        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        if (Auth::user()->id_role==3 or Auth::user()->id_role==2) {
            $demandevehicule =DB::table('demandevehicules')
        ->where('supprimer',0)
        ->orderBY('id','DESC')
        ->get();
        return view('pages.vehicule_planning',compact('demandevehicule','notification'));
        }
    }


    public function demande_salle()
    {  
       denotifier(Auth::user()->id_role,Auth::user()->id,"demande_salle");
       if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


       if (Auth::user()->id_role==3) {
           $reunion =DB::table('reunions')
        ->where('supprimer',0)
        ->orderBY('id','DESC')
        ->get();
        return view('pages.salle_demande',compact('reunion','notification'));
       }elseif ( Auth::user()->id_role==2) {
            $reunion =DB::table('reunions')
        ->where([['supprimer',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();
        return view('pages.salle_demande_manager',compact('reunion','notification'));
       }
    }


    public function demande_vehicule()
    {  
       denotifier(Auth::user()->id_role,Auth::user()->id,"demande_vehicule");
       if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


       if (Auth::user()->islogistique==1) {
           $demandevehicule =DB::table('demandevehicules')
        ->where('supprimer',0)
        ->orderBY('id','DESC')
        ->get();
        return view('pages.vehicule_demande',compact('demandevehicule','notification'));
       }elseif (( Auth::user()->id_role==2)or( Auth::user()->id_role==3)) {
            $demandevehicule =DB::table('demandevehicules')
        ->where([['supprimer',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();
        return view('pages.vehicule_demande_manager',compact('demandevehicule','notification'));
       }
    }

     public function planning_conge()
    {  
         if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        if (Auth::user()->id_role==3) {
            $conge =DB::table('conges')
        ->where('supprimer',0)
        ->orderBY('id','DESC')
        ->get();
        return view('pages.conge_planning',compact('conge','notification'));
        }elseif (Auth::user()->id_role==2) {
            $conge =DB::table('conges')
         ->where([['responsable',Auth::user()->id],['supprimer',0]])
        ->orderBY('id','DESC')
        ->get();
        return view('pages.conge_planning',compact('conge','notification'));
        }else{
              $conge =DB::table('conges')
         ->where([['id_user',Auth::user()->id],['supprimer',0]])
        ->orderBY('id','DESC')
        ->get();
        return view('pages.conge_planning',compact('conge','notification'));
        }
    }

     public function liste_all_conge()
    {  
        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        if (Auth::user()->id_role==3) {
            $conge =DB::table('conges')
        ->where('supprimer',0)
        ->orderBY('id','DESC')
        ->get();
        return view('pages.conge_all_demande',compact('conge','notification'));
        }
    }

    public function etat_conge($id)
    {  
        if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }

       
           $conge =conge_pris($id);
        $id_user=$id;
        return view('pages.conge_etat',compact('conge','id_user','notification'));
      
    }

     public function demande_conge()
    {  

      denotifier(Auth::user()->id_role,Auth::user()->id,"demande_conge");

       if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        if (Auth::user()->id_role==3) {
            $conge =DB::table('conges')
        ->where([['responsable',Auth::user()->id],['supprimer',0]])
        ->orWhere([['id_user',Auth::user()->id],['supprimer',0]])
        ->orderBY('id','DESC')
        ->get();
        return view('pages.conge_demande',compact('conge','notification'));
        }elseif (Auth::user()->id_role==2) {
            $conge =DB::table('conges')
        ->where([['responsable',Auth::user()->id],['supprimer',0]])
        ->orWhere([['id_user',Auth::user()->id],['supprimer',0]])
        ->orderBY('id','DESC')
        ->get();
        return view('pages.conge_demande_manager',compact('conge','notification'));
        }else{

             $conge =DB::table('conges')
        ->where([['id_user',Auth::user()->id],['supprimer',0]])
        ->orderBY('id','DESC')
        ->get();
        return view('pages.conge_demande_collabo',compact('conge','notification'));

        }
    }

    public function personnel()
    {  
       if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        if (Auth::user()->id_role==3) {
            $personnel =DB::table('users')->orderBY('id','DESC')->get();
        return view('pages.personnel',compact('personnel','notification'));
        }
    }
    

     public function inscription()
    {   
       if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }

        $direction = DB::table('directions')->get();
          $service = DB::table('services')->get();


       if (Auth::user()->id_role==3) {

             $role = DB::table('roles')->get();
            return view('auth.register',compact('role','notification','direction','service'));
       }
    }

     public function role()
    {   
       if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        if (Auth::user()->id_role==3) {
            $personnel =DB::table('users')->orderBY('id','DESC')->get();
           $role = DB::table('roles')->get();
        return view('pages.role',compact('personnel','role','notification'));
        }
    }

    public function delegation()
    {   
       if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        $personnel =DB::table('users')->where('id','!=',Auth::user()->id)->get();
        $delegation =DB::table('delegations')->where('id_delegant',Auth::user()->id)->get();
            return view('pages.delegation',compact('personnel','delegation','notification'));
    }

    public function all_delegation()
    {   
      if (Auth::user()->id_role==3) {
         $notification =DB::table('notifications')
        ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orWhere([['etat',0],['id_user',0]])
        ->orderBY('id','DESC')
        ->get();
        }else{

          $notification =DB::table('notifications')
         ->where([['etat',0],['id_user',Auth::user()->id]])
        ->orderBY('id','DESC')
        ->get();

        }


        if (Auth::user()->id_role==3) {
        $personnel =DB::table('users')->get();
        $delegation =DB::table('delegations')->get();
            return view('pages.delegation_all',compact('delegation','notification'));
            }
    }



}
