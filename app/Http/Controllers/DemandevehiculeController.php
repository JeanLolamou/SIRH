<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Demandevehicule;
use auth;
use DateTime;
use Mail;
use App\Mail\MailConge;
use App\Notifications\AlertNotification;
use App\User;

class DemandevehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if (Auth::user()->id_role==3) {
            $personnel = DB::table('users')->get();
       }elseif (Auth::user()->id_role==2) {
           $personnel = DB::table('users')->where('id',Auth::user()->id)->get();
       }

        $vehicules = DB::table('vehicules')->where('supprimer',0)->get();

        return view('pages.vehicule_ajout',compact('personnel','vehicules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,['date'=>'required','heur_debut'=>'required','heur_fin'=>'required']);

        $data=array(
           'nom'=>nom_user($request->personnel)
          );


$vehicule_pris = vehicule_pris($request->vehicule,$request->date,$request->heur_debut,$request->heur_fin);

if ($vehicule_pris) {
     session()->flash('error','Créneau horaire déja pris pour le vehicule');

        $personnel = DB::table('users')->get();
        $vehicules = DB::table('vehicules')->where('supprimer',0)->get();
        return view('pages.vehicule_ajout',compact('personnel','vehicules'));
}else{

    $statut=0;

    if (Auth::user()->id_role==3) {
      $statut=1;
    }elseif (Auth::user()->id_role==2) {
       $statut=0;
    }

      Demandevehicule::create(['id_user'=>$request->personnel,'id_vehicule'=>$request->vehicule, 'date'=>$request->date, 'heur_debut'=>$request->heur_debut, 'heur_fin'=>$request->heur_fin, 'commentaire'=>$request->commentaire,  'statut'=>$statut,  'responsable'=>Auth::user()->id, 'libelle'=>$request->libelle]);

        session()->flash('success','Demande ajouté avec succés');

        notifier(0,"Vous avez une demande de vehicule en attente","demande_vehicule");

        $utilisateur=User::where('id', id_rh())->first();

          try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}

         // Mail::to(mail_rh())->send(new MailConge($data));

        return redirect()->route('Demandevehicule.create');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $demandevehicule = DB::table('demandevehicules')->where('id',$id)->get();

        
     return view ('pages.vehicule_show', compact('demandevehicule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $demandevehicule = DB::table('demandevehicules')->where('id',$id)->get();
         $personnel = DB::table('users')->get();    
     return view ('pages.vehicule_edit', compact('demandevehicule','personnel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data=array(
           'nom'=>nom_user($request->personnel)
          );
        if (isset($request->sup)) {
          //suppression
           $vehicule1 = Demandevehicule::where('id','=',$id);
         
              $vehicule1->update(['supprimer'=>1]);
         

          
         session()->flash('success','Suppression effectuée avec succées');

         return redirect()->route('demande_vehicule');
         }else if (isset($request->valide)) {
          //activation
            $vehicule1 = Demandevehicule::where('id','=',$id);
         
              $vehicule1->update(['statut'=>1]);
         

          
         session()->flash('success','Validation effectuée avec succées');

         $demandevehicule = DB::table('demandevehicules')->where('id',$id)->get();
         $iduser=0;
         foreach ($demandevehicule as $demandevehicule) {
             $iduser=$demandevehicule->id_user;
         }

          notifier($iduser,"Vous avez une demande de vehicule validée","demande_vehicule");

          $utilisateur=User::where('id', $iduser)->first();

          try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}

          // Mail::to(mail_user($iduser))->send(new MailConge($data));

         return redirect()->route('demande_vehicule');
         }else if (isset($request->annule)) {
          //desactivation
            $vehicule1 = Demandevehicule::where('id','=',$id);
         
              $vehicule1->update(['statut'=>2]);
         

          
         session()->flash('success','Annulation effectuée avec succées');

         $demandevehicule = DB::table('demandevehicules')->where('id',$id)->get();
         $iduser=0;
         foreach ($demandevehicule as $demandevehicule) {
             $iduser=$demandevehicule->id_user;
         }

          notifier($iduser,"Vous avez une demande de salle annulée","demande_vehicule");

          $utilisateur=User::where('id', $iduser)->first();

          try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}
          
          // Mail::to(mail_user($iduser))->send(new MailConge($data));

         return redirect()->route('demande_vehicule');
         }else{ 
         //modification

            $this->validate($request,['date'=>'required','heur_debut'=>'required','heur_fin'=>'required']);

        


$vehicule_pris = vehicule_pris($request->date,$request->heur_debut,$request->heur_fin);

if ($vehicule_pris) {
     session()->flash('error','Créneau horaire déja prise pour le vehicule');

         
        return redirect()->route('Demandevehicule.edit',$id);
}else if (isset($request->modif)){

    $vehicule1 = Demandevehicule::where('id','=',$id);

         $vehicule1->update(['date'=>$request->date,'heur_debut'=>$request->heur_debut, 'heur_fin'=>$request->heur_fin, 'commentaire'=>$request->commentaire, 'libelle'=>$request->libelle]);

          
         session()->flash('success','Modification effectuée avec succées');

         
        return redirect()->route('Demandevehicule.edit',$id);
}

         

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
