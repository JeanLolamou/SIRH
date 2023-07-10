<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Entretien;
use auth;
use Mail;
use App\Mail\MailConge;
use App\Notifications\AlertNotification;
use App\User;

class DemandeEntretienController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['description'=>'required']);

        $statut=0;

         $data=array(
           'nom'=>nom_user(Auth::user()->id)
          );

    if (Auth::user()->id_role==1 or Auth::user()->id_role==2) {
      $statut=0;
    }elseif (Auth::user()->id_role==3) {
       $statut=1;
    }

   if ($request->type=="MANAGER") {
       
     Entretien::create(['id_user'=>$request->personnel, 'libelle'=>$request->type, 'description'=>$request->description, 'statut'=>$statut,'heur'=>$request->heur, 'date'=>$request->date, 'id_responsable'=>directeur(user_direction($request->personnel))]);

       session()->flash('success','Demande ajouté avec succés');
        $utilisateur=User::where('id', directeur(user_direction($request->personnel)))->first();
        notifier(directeur(user_direction($request->personnel)),"Vous avez une demande d'entretiens en attente","demande_entretien");
    }else{

            Entretien::create(['id_user'=>$request->personnel, 'libelle'=>$request->type, 'description'=>$request->description, 'statut'=>$statut,'heur'=>$request->heur, 'date'=>$request->date]);

            session()->flash('success','Demande ajouté avec succés');

            $utilisateur=User::where('id', id_rh())->first();
            notifier(0,"Vous avez une demande d'entretiens en attente","demande_entretien");
        }

         try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}

        return redirect()->route('demande_entretien');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demandeentretien = DB::table('entretiens')->where('id',$id)->get();
        
        return view('pages.demande_entretien_details',compact('demandeentretien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id_role==3) {
           $demandeentretien = DB::table('entretiens')->where('id',$id)->get();
        $personnel =DB::table('users')->orderBY('id','DESC')->get();
        return view('pages.demande_entretien_edit',compact('demandeentretien','personnel'));
        }else{
           $demandeentretien = DB::table('entretiens')->where('id',$id)->get();
        $personnel =DB::table('users')->where('id',Auth::user()->id)->get();
        return view('pages.demande_entretien_edit',compact('demandeentretien','personnel'));
        }
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
        $demandeentretien1 = Entretien::where('id','=',$id);

         if (isset($request->sup)) {
          //suppression
         
              $demandeentretien1->update(['supprimer'=>1]);

         session()->flash('success','Suppression effectuée avec succées');

         return redirect()->route('demande_entretien');

         }else if (isset($request->valide)) {
          //validation
            $fichier = $request->file('file');

           $demandeentretien1->update(['statut'=>1,'reponse'=>$request->reponse]);
          
         session()->flash('success','Validation effectuée avec succées');

         $demandeentretien = DB::table('entretiens')->where('id',$id)->get();
         $iduser=0;
         foreach ($demandeentretien as $demandeentretien) {
             $iduser=$demandeentretien->id_user;
         }

          notifier($iduser,"Vous avez une demande d'entretiens validée","demande_entretien");

           $utilisateur=User::where('id', $iduser)->first();

         try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}


         return redirect()->route('demande_entretien');
         }else if (isset($request->annule)) {
          //annulation
            $demandeentretien1 = Entretien::where('id','=',$id);
         
              $demandeentretien1->update(['statut'=>2,'reponse'=>$request->reponse]);
         

          
         session()->flash('success','Annulation effectuée avec succées');

          $demandeentretien = DB::table('entretiens')->where('id',$id)->get();
         $iduser=0;
         foreach ($demandeentretien as $demandeentretien) {
             $iduser=$demandeentretien->id_user;
         }

          notifier($iduser,"Vous avez une demande d'entretiens annulée","demande_entretien");

          $utilisateur=User::where('id', $iduser)->first();

         try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}
        
          // Mail::to(mail_user($iduser))->send(new MailConge($data));

         return redirect()->route('demande_entretien');
         }else{ 
         //modification

            $this->validate($request,['description'=>'required']);

              $demandeentretien1->update(['libelle'=>$request->type, 'description'=>$request->description,'heur'=>$request->heur, 'date'=>$request->date]);

              session()->flash('success','modification effectuée avec succées');

         return redirect()->route('DemandeEntretien.edit',$id);
         

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
