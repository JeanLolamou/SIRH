<?php

namespace App\Http\Controllers;

use App\User;
use App\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use auth;

class UserController extends Controller
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
      $actif=0;$isadmin=0;$islogistique=0;
      if (isset($request->actif)) {
        $actif=$request->actif;
        }

        if ($request->role==5) {
        $isadmin=1;
        $request->merge([
            'role' => 3,
        ]);

        }
        if ($request->role==4) {
        $islogistique=1;
        $request->merge([
            'role' => 1,
        ]);
        }
        
         $utilisateur= new User();
       $utilisateur->name = $request->get('name');
       $utilisateur->email = $request->get('email');
       $utilisateur->password = Hash::make($request->get('password'));
       $utilisateur->prenom = $request->get('prenom');
       $utilisateur->adresse = $request->get('adresse');
       $utilisateur->tel = $request->get('tel');
       $utilisateur->tel_urgence = $request->get('tel2');
       $utilisateur->id_direction = $request->get('direction');
       $utilisateur->id_service = $request->get('service');
       $utilisateur->poste = $request->get('poste');
       $utilisateur->id_role = $request->get('role');
       $utilisateur->naissance = $request->get('naissance');
       $utilisateur->entree = $request->get('entree');
       $utilisateur->typecontrat = $request->get('typecontrat');
       $utilisateur->statut = $actif;
       $utilisateur->isadmin = $isadmin;
       $utilisateur->islogistique = $islogistique;
       $utilisateur->save();

       // $personnel=User::all()->last();
     
       //    Conge::create(['type'=>1, 'nbr_jours'=>28, 'id_user'=>$personnel->id]);
       

        
        session()->flash('success','Enregistrement effectué avec succées');
      return redirect()->route ('inscription');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $personnel = DB::table('users')->where('id',$id)->get();
        
     return view ('pages.personnel_profil', compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $personnel = DB::table('users')->where('id',$id)->get();
          $direction = DB::table('directions')->get();
          $categorie = DB::table('categories')->get();
          $service = DB::table('services')->get();
           $role = DB::table('roles')->get();
           $fichier = DB::table('documents')
           ->where([['id_user',$id],['type','document_profession'],['supprimer',0]])
           ->get();
        return view ('pages.personnel_edit', compact('personnel','direction','categorie','service','role','fichier'));
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
        if (Auth::user()->id_role==3) {
         if (isset($request->desactiver)) {
          //suppression
           $personnel1 = User::where('id','=',$id);
         
              $personnel1->update(['statut'=>2]);
         

          
         session()->flash('success','Désactivation effectuée avec succées');

         $personnel = DB::table('users')->where('id',$id)->get();
         $direction = DB::table('directions')->get();
          $service = DB::table('services')->get();
           $role = DB::table('roles')->get();
        return redirect()->route('User.edit',$id);
         }else if (isset($request->statut)) {
          //activation
           $personnel1 = User::where('id','=',$id);
         
              $personnel1->update(['statut'=>$request->statut]);
         

          
         session()->flash('success','Modification effectuée avec succées');

    
          $personnel = DB::table('users')->where('id',$id)->get();
          $direction = DB::table('directions')->get();
          $service = DB::table('services')->get();
           $role = DB::table('roles')->get();
        return redirect()->route('User.edit',$id);
         }else if (isset($request->pass)){ 
         //modification pass

         $users1 = User::where('id','=',$id);

         $pass=Hash::make($request->get('pass'));
        
          $users1->update(['password'=>$pass]);

          
         session()->flash('success','Mot de pass modifié avec succés');

          return redirect()->route('profil');

        }else if (isset($request->modif)){ 
         //modification

         $personnel1 = User::where('id','=',$id);
          if (!isset($request->image)) {
        $personnel1->update(['name'=>$request->name, 'prenom'=>$request->prenom, 'email'=>$request->email, 'tel'=>$request->tel, 'tel_urgence'=>$request->tel_urgence, 'adresse'=>$request->adresse, 'poste'=>$request->poste, 'id_direction'=>$request->direction, 'id_service'=>$request->service, 'naissance'=>$request->naissance, 'entree'=>$request->entree, 'typecontrat'=>$request->typecontrat]);
          }else{
           $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/profil'), $imageName);

             $personnel1->update(['photo'=>$imageName]);
          }

          
         session()->flash('success','Modification effectuée avec succées');

          
        return redirect()->route('User.edit',$id);

        }elseif (isset($request->modif_role)) {

           $personnel1 = User::where('id','=',$id);
          $personnel1->update(['id_role'=>$request->role]);

          session()->flash('success','Modification effectuée avec succées');

          $personnel =DB::table('users')->orderBY('id','DESC')->get();
           $role = DB::table('roles')->get();
        return view('pages.role',compact('personnel','role'));
        }
        }else{
         if (isset($request->modif)){ 
         //modification

         $personnel1 = User::where('id','=',$id);
          if (!isset($request->image)) {
        $personnel1->update(['name'=>$request->name, 'prenom'=>$request->prenom, 'email'=>$request->email, 'tel'=>$request->tel, 'tel_urgence'=>$request->tel_urgence, 'adresse'=>$request->adresse, 'id_service'=>$request->service]);
          }else{
           $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/profil'), $imageName);

             $personnel1->update(['photo'=>$imageName]);
          }

          
         session()->flash('success','Modification effectuée avec succées');

          
        return redirect()->route('profil');

        }else if (isset($request->pass)){ 
         //modification pass

         $users1 = User::where('id','=',$id);

         $pass=Hash::make($request->get('pass'));
        
          $users1->update(['password'=>$pass]);

          
         session()->flash('success','Mot de pass modifié avec succés');

          return redirect()->route('profil');

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
