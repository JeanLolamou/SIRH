<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Conge;
use App\Document;
use auth;
use DateTime;
use Mail;
use App\Mail\MailConge;
use App\Notifications\AlertNotification;
use App\User;


class CongeController extends Controller
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
            $type_conge = DB::table('typesconges')->where('supprimer',0)->get();
            return view('pages.conge_ajout',compact('personnel','type_conge'));

         }elseif (Auth::user()->id_role==2) {
              $personnel = DB::table('users')->where('id',Auth::user()->id)->get();
            $type_conge = DB::table('typesconges')->where('supprimer',0)->get();
            $responsable = DB::table('users')->where('id_role',3)->get();
            return view('pages.conge_ajout_manager',compact('personnel','type_conge','responsable'));
         }else{
            $id_directeur=directeur(Auth::user()->id_direction);
             $personnel = DB::table('users')->where('id',Auth::user()->id)->get();
            $type_conge = DB::table('typesconges')->where('supprimer',0)->get();
        $responsable = DB::table('users')->where('id',$id_directeur)->get();
            return view('pages.conge_ajout_manager',compact('personnel','type_conge','responsable'));
         }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,['date_debut'=>'required','date_fin'=>'required']);

        $data=array(
           'nom'=>nom_user($request->personnel)
          );

        if (Auth::user()->id_role==3) {
           $fdate = $request->date_debut;
$tdate = $request->date_fin;
$datetime1 = new DateTime($fdate);
$datetime2 = new DateTime($tdate);
$interval = $datetime2->diff($datetime1);
$days = $interval->format('%a');

$conge_pris = conge_pris($request->personnel);
$conge_restant=30-$conge_pris;

if ($days>$conge_restant and $request->type==1) {
     session()->flash('error','Solde congé inferieur à la demande');

       return redirect()->route('Conge.create');
}else{

     if (!isset($request->fichier)) {

         Conge::create(['id_user'=>$request->personnel, 'type'=>$request->type, 'date_debut'=>$request->date_debut, 'date_fin'=>$request->date_fin, 'commentaire'=>$request->commentaire,  'statut'=>1,  'responsable'=>Auth::user()->id, 'nbrjours'=>$days]);
     }else{

         $fichierName = time().'.'.$request->fichier->getClientOriginalExtension();
  $request->fichier->move(public_path('/document/conge'), $fichierName);

  Conge::create(['id_user'=>$request->personnel, 'type'=>$request->type, 'date_debut'=>$request->date_debut, 'date_fin'=>$request->date_fin, 'document'=>1, 'commentaire'=>$request->commentaire,  'statut'=>1,  'responsable'=>Auth::user()->id, 'nbrjours'=>$days]);

   $der_conge=Conge::all()->last();

Document::create(['id_user'=>$request->personnel, 'type'=>'conge', 'libelle'=>$fichierName, 'id_conge'=>$der_conge->id]);

     }



        session()->flash('success','Demande ajouté avec succés');

        notifier(Auth::user()->id,"Vous avez une demande de congé en attente","demande_conge");

        return redirect()->route('etat_conge',$request->personnel);

        }
        }elseif (Auth::user()->id_role==2 or Auth::user()->id_role==1) {


             $fdate = $request->date_debut;
$tdate = $request->date_fin;
$datetime1 = new DateTime($fdate);
$datetime2 = new DateTime($tdate);
$interval = $datetime2->diff($datetime1);
$days = $interval->format('%a');

$conge_pris = conge_pris($request->personnel);
$conge_restant=30-$conge_pris;

if ($days>$conge_restant and $request->type==1) {
     session()->flash('error','Solde congé inferieur à la demande');

       return redirect()->route('Conge.create');
}else{

     if (!isset($request->fichier)) {
         Conge::create(['id_user'=>$request->personnel, 'type'=>$request->type, 'date_debut'=>$request->date_debut, 'date_fin'=>$request->date_fin, 'commentaire'=>$request->commentaire,  'statut'=>0,  'responsable'=>$request->responsable, 'nbrjours'=>$days]);
     }else{

         $fichierName = time().'.'.$request->fichier->getClientOriginalExtension();
  $request->fichier->move(public_path('/document/conge'), $fichierName);

  Conge::create(['id_user'=>$request->personnel, 'type'=>$request->type, 'date_debut'=>$request->date_debut, 'date_fin'=>$request->date_fin, 'document'=>1, 'commentaire'=>$request->commentaire,  'statut'=>0,  'responsable'=>$request->responsable, 'nbrjours'=>$days]);

   $der_conge=Conge::all()->last();

Document::create(['id_user'=>$request->personnel, 'type'=>'conge', 'libelle'=>$fichierName, 'id_conge'=>$der_conge->id]);

     }

        session()->flash('success','Demande ajouté avec succés');

         notifier($request->responsable,"Vous avez une demande de congé en attente","demande_conge");
      

        $utilisateur=User::where('id', $request->responsable)->first();

          try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    session()->flash('success','Demande ajouté avec succés mais E-mail non envoyé');

    return redirect()->route('etat_conge',$request->personnel);
}

        

        

       
        
    }
            

        }else{
            # code...
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
       $conge = DB::table('conges')->where('id',$id)->get();
           return view ('pages.conge_show', compact('conge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $conge = DB::table('conges')->where('id',$id)->get();
         $personnel = DB::table('users')->get();
         $type_conge = DB::table('typesconges')->where('supprimer',0)->get();        
     return view ('pages.conge_edit', compact('conge','personnel','type_conge'));
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
           'nom'=>nom_user(Auth::user()->id)
          );

        if (Auth::user()->id_role==3 or Auth::user()->id_role==2 or Auth::user()->id_role==1 ) {
           if (isset($request->sup)) {
          //suppression
           $conge1 = Conge::where('id','=',$id);
         
              $conge1->update(['supprimer'=>1]);
         

          
         session()->flash('success','Suppression effectuée avec succées');

        
         return redirect()->route('demande_conge');
         }else if (isset($request->valide)) {
          //activation
            $conge1 = Conge::where('id','=',$id);
         
              $conge1->update(['statut'=>1,'reponse'=>$request->reponse]);
         

          
         session()->flash('success','Validation effectuée avec succées');
        $conges = DB::table('conges')->where('id',$id)->get();
         $iduser=0;
         foreach ($conges as $conges) {
             $iduser=$conges->id_user;
         }

          notifier($iduser,"Vous avez une demande de congés validée","demande_conge");

          Mail::to(mail_user($iduser))->send(new MailConge($data));
         
         return redirect()->route('demande_conge');
         }else if (isset($request->annule)) {
          //desactivation
            $conge1 = Conge::where('id','=',$id);
         
              $conge1->update(['statut'=>2,'reponse'=>$request->reponse]);
         

          
         session()->flash('success','Annulation effectuée avec succées');

         $conges = DB::table('conges')->where('id',$id)->get();
         $iduser=0;
         foreach ($conges as $conges) {
             $iduser=$conges->id_user;
         }

          notifier($iduser,"Vous avez une demande de congés annulée","demande_conge");
          Mail::to(mail_user($iduser))->send(new MailConge($data));

         return redirect()->route('demande_conge');
         }else{ 
         //modification

             $fdate = $request->date_debut;
$tdate = $request->date_fin;
$datetime1 = new DateTime($fdate);
$datetime2 = new DateTime($tdate);
$interval = $datetime2->diff($datetime1);
$days = $interval->format('%a');

$conge_pris = conge_pris($request->personnel);
$conge_restant=30-$conge_pris;

if ($days>$conge_restant and $request->type==1) {
     session()->flash('error','Solde congé inferieur à la demande');

       
        return redirect()->route('Conge.edit',$id);
}else if (isset($request->modif)){

    $conge1 = Conge::where('id','=',$id);

         $conge1->update(['type'=>$request->type, 'date_debut'=>$request->date_debut, 'date_fin'=>$request->date_fin, 'commentaire'=>$request->commentaire, 'nbrjours'=>$days]);

          
         session()->flash('success','Modification effectuée avec succées');

          $personnel = DB::table('users')->get();
         $type_conge = DB::table('typesconges')->where('supprimer',0)->get();
        return redirect()->route('Conge.edit',$id);
}

         

        }
        }else{

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
