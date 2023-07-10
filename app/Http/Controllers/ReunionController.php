<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reunion;
use auth;
use DateTime;
use Mail;
use App\Mail\MailConge;
use App\Notifications\AlertNotification;
use App\User;

class ReunionController extends Controller
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

        $salle = DB::table('typesalles')->where('supprimer',0)->get();

        return view('pages.salle_ajout',compact('personnel','salle'));
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


$salle_pris = salle_pris($request->salle,$request->date,$request->heur_debut,$request->heur_fin);

if ($salle_pris) {
     session()->flash('error','Créneau horaire déja pris pour la salle');

        $personnel = DB::table('users')->get();
        $salle = DB::table('typesalles')->where('supprimer',0)->get();
        return view('pages.salle_ajout',compact('personnel','salle'));
}else{

    $statut=0;

    if (Auth::user()->id_role==3) {
      $statut=1;
    }elseif (Auth::user()->id_role==2) {
       $statut=0;
    }

      Reunion::create(['id_user'=>$request->personnel,'id_salle'=>$request->salle, 'date'=>$request->date, 'heur_debut'=>$request->heur_debut, 'heur_fin'=>$request->heur_fin, 'commentaire'=>$request->commentaire,  'statut'=>$statut,  'responsable'=>Auth::user()->id, 'libelle'=>$request->libelle]);

        session()->flash('success','Demande ajouté avec succés');

        notifier(0,"Vous avez une demande de salle en attente","demande_salle");

        $utilisateur=User::where('id', id_rh())->first();

         try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}

         // Mail::to(mail_rh())->send(new MailConge($data));

        return redirect()->route('Reunion.create');

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
        $reunion = DB::table('reunions')->where('id',$id)->get();

        
     return view ('pages.salle_show', compact('reunion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reunion = DB::table('reunions')->where('id',$id)->get();
         $personnel = DB::table('users')->get();    
     return view ('pages.salle_edit', compact('reunion','personnel'));
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
           $reunion1 = Reunion::where('id','=',$id);
         
              $reunion1->update(['supprimer'=>1]);
         

          
         session()->flash('success','Suppression effectuée avec succées');

         return redirect()->route('demande_salle');
         }else if (isset($request->valide)) {
          //activation
            $reunion1 = Reunion::where('id','=',$id);
         
              $reunion1->update(['statut'=>1]);
         

          
         session()->flash('success','Validation effectuée avec succées');

         $reunion = DB::table('reunions')->where('id',$id)->get();
         $iduser=0;
         foreach ($reunion as $reunion) {
             $iduser=$reunion->id_user;
         }

          notifier($iduser,"Vous avez une demande de salle validée","demande_salle");

          $utilisateur=User::where('id', $iduser)->first();

         try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}

          // Mail::to(mail_user($iduser))->send(new MailConge($data));

         return redirect()->route('demande_salle');
         }else if (isset($request->annule)) {
          //desactivation
            $reunion1 = Reunion::where('id','=',$id);
         
              $reunion1->update(['statut'=>2]);
         

          
         session()->flash('success','Annulation effectuée avec succées');

         $reunion = DB::table('reunions')->where('id',$id)->get();
         $iduser=0;
         foreach ($reunion as $reunion) {
             $iduser=$reunion->id_user;
         }

          notifier($iduser,"Vous avez une demande de salle annulée","demande_salle");

          $utilisateur=User::where('id', $iduser)->first();

          try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}
          
          // Mail::to(mail_user($iduser))->send(new MailConge($data));

         return redirect()->route('demande_salle');
         }else{ 
         //modification

            $this->validate($request,['date'=>'required','heur_debut'=>'required','heur_fin'=>'required']);

        


$salle_pris = salle_pris($request->date,$request->heur_debut,$request->heur_fin);

if ($salle_pris) {
     session()->flash('error','Créneau horaire déja prise pour la salle');

         
        return redirect()->route('Reunion.edit',$id);
}else if (isset($request->modif)){

    $reunion1 = Reunion::where('id','=',$id);

         $reunion1->update(['date'=>$request->date,'heur_debut'=>$request->heur_debut, 'heur_fin'=>$request->heur_fin, 'commentaire'=>$request->commentaire, 'libelle'=>$request->libelle]);

          
         session()->flash('success','Modification effectuée avec succées');

         
        return redirect()->route('Reunion.edit',$id);
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
