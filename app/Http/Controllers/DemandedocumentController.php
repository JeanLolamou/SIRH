<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Demandedocument;
use App\Document;
use App\User;
use Mail;
use App\Mail\MailConge;
use App\Notifications\AlertNotification;
use auth;

class DemandedocumentController extends Controller
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
        return view('pages.demande_document_ajout',compact('personnel'));
         }else {
               $personnel = DB::table('users')->where('id',Auth::user()->id)->get();
        return view('pages.demande_document_ajout',compact('personnel'));
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
       $this->validate($request,['sujet'=>'required','description'=>'required']);

        $statut=0;

         $data=array(
           'nom'=>nom_user(Auth::user()->id)
          );

    if (Auth::user()->id_role==1) {
      $statut=0;
    }elseif (Auth::user()->id_role==2) {
       $statut=0;
    }


 if (!isset($request->fichier)) {
         Demandedocument::create(['id_user'=>$request->personnel, 'type_demande'=>'Demande document', 'sujet'=>$request->sujet, 'description'=>$request->description, 'statut'=>$statut, 'date'=> date("Y-m-d")]);
     }else{

         $fichierName = time().'.'.$request->fichier->getClientOriginalExtension();
  $request->fichier->move(public_path('/document/demande_document'), $fichierName);

  Demandedocument::create(['id_user'=>$request->personnel, 'type_demande'=>'Demande document', 'sujet'=>$request->sujet, 'description'=>$request->description, 'statut'=>$statut,'document_user'=>$fichierName, 'date'=> date("Y-m-d")]);

     }

        session()->flash('success','Demande ajouté avec succés');

        notifier(0,"Vous avez une demande de documents en attente","demande_document");

         $utilisateur=User::where('id', id_rh())->first();

           try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}

        

        // Mail::to(mail_rh())->send(new MailConge($data));
        return redirect()->route('DemandeDocument.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $document = DB::table('demandedocuments')->where('id',$id)->get();
         $fichier = DB::table('documents')->where('id_demande_doc',$id)->get();
        return view('pages.demande_document_details',compact('document','fichier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
         $document = DB::table('demandedocuments')->where('id',$id)->get();
        return view('pages.demande_document_edit',compact('document'));
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
        $demandedocument1 = Demandedocument::where('id','=',$id);
        $data=array(
           'nom'=>nom_user($request->personnel)
          );
        if (isset($request->sup)) {
          //suppression
         
              $demandedocument1->update(['supprimer'=>1]);

         session()->flash('success','Suppression effectuée avec succées');

         return redirect()->route('demande_document');

         }else if (isset($request->valide)) {
          //validation
            $fichier = $request->file('file');

           if($request->hasFile('file'))
            {
                 foreach ($fichier as $fichier) 
                 {
                    $fichierName = time().'.'.$fichier->getClientOriginalExtension();
                    $fichier->move(public_path('/document/demande_document'), $fichierName);

                Document::create(['type'=>'demande_document', 'libelle'=>$fichierName, 'id_demande_doc'=>$id]);
                 }

                 $demandedocument1->update(['statut'=>1,'reponse'=>$request->reponse]);
            }
          
         session()->flash('success','Validation et Reponse effectuée avec succées');

          $documents = DB::table('demandedocuments')->where('id',$id)->get();
         $iduser=0;
         foreach ($documents as $documents) {
             $iduser=$documents->id_user;
         }

          notifier($iduser,"Vous avez une demande de documents validée et repondue","demande_document");

            $utilisateur=User::where('id', $iduser)->first();

              try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}

           

          // Mail::to(mail_user($iduser))->send(new MailConge($data));
         return redirect()->route('demande_document');
         }else if (isset($request->annule)) {
          //annulation
            $demandedocument1 = Demandedocument::where('id','=',$id);
         
              $demandedocument1->update(['statut'=>2,'reponse'=>$request->reponse]);
         

          
         session()->flash('success','Annulation effectuée avec succées');

          $documents = DB::table('demandedocuments')->where('id',$id)->get();
         $iduser=0;
         foreach ($documents as $documents) {
             $iduser=$documents->id_user;
         }

          notifier($iduser,"Vous avez une demande de documents annulée","demande_document");

           $utilisateur=User::where('id', $iduser)->first();

             try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}


         return redirect()->route('demande_document');
         }else{ 
         //modification

            $this->validate($request,['sujet'=>'required','description'=>'required']);

              $demandedocument1->update(['sujet'=>$request->sujet, 'description'=>$request->description, 'date'=> date("Y-m-d")]);

              session()->flash('success','modification effectuée avec succées');

         return redirect()->route('DemandeDocument.edit',$id);
         

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
