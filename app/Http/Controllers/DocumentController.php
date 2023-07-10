<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Document;
use auth;

class DocumentController extends Controller
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
        if (isset($request->document_profession)) {

             $fichierName = time().'.'.$request->fichier->getClientOriginalExtension();
  $request->fichier->move(public_path('/document/document_profession'), $fichierName);

  Document::create(['id_user'=>$request->id_user, 'type'=>'document_profession', 'libelle'=>$fichierName,'details'=>$request->details]);

  session()->flash('success','Document ajouté avec succés');

       return redirect()->route('User.edit', $request->id_user);
           
        }else{
             $fichierName = time().'.'.$request->fichier->getClientOriginalExtension();
  $request->fichier->move(public_path('/document/document_partager'), $fichierName);

  Document::create(['id_user'=>Auth::user()->id, 'type'=>'partage', 'confidentialite'=>$request->confidentialite, 'libelle'=>$fichierName,'details'=>$request->details]);

  session()->flash('success','Document partagé avec succés');

       return redirect()->route('document');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if (isset($request->sup)) {
          //suppression
           $document1 = Document::where('id','=',$id);
         
              $document1->update(['supprimer'=>1]);
         

          
         session()->flash('success','Suppression effectuée avec succées');

         if (isset($request->id_user)) {
             return redirect()->route('User.edit', $request->id_user);
         }else{

            return redirect()->route('document');
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
