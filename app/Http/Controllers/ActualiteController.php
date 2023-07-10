<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Actualite;
use auth;

class ActualiteController extends Controller
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
        return view('pages.actualite_ajout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['date_publier'=>'required','titre'=>'required','contenu'=>'required','image'=>'required']);

     

     $imageName = time().'.'.$request->image->getClientOriginalExtension();
  $request->image->move(public_path('/images/actualite'), $imageName);

        Actualite::create(['titre'=>$request->titre, 'contenu'=>$request->contenu, 'date_publier'=>$request->date_publier, 'image'=>$imageName, 'supprimer'=>0]);

       

        session()->flash('success','Article ajouté avec succés');
     return redirect()->route('actualite');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actualites = DB::table('actualites')->where('id_actualite',$id)->get();
        $infos = DB::table('actualites')->where('id_actualite','!=',$id)->orderBY('id_actualite','DESC')->paginate(5);
     return view ('pages.article', compact('actualites','infos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actualites = DB::table('actualites')->where('id_actualite',$id)->get();

        return view('pages.actualite_edit',compact('article'));
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
           $article1 = Actualite::where('id_actualite','=',$id);
         
              $article1->update(['supprimer'=>1]);
         

          
         session()->flash('success','Suppression effectuée avec succées');

    
        return redirect()->route('actualite');
         }else if (isset($request->restaurer)) {
          //restauration
           $article1 = Actualite::where('id_actualite','=',$id);
         
              $article1->update(['supprimer'=>0]);
         

          
         session()->flash('success','Restauration effectuée avec succées');

    
        return redirect()->route('actualite');
         }else{ 
         //modification

         $article1 = Actualite::where('id_actualite','=',$id);
          if (!isset($request->image)) {
        $article1->update(['titre'=>$request->titre, 'contenu'=>$request->contenu, 'date_publier'=>$request->date_publier]);
          }else{
           $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/actualite'), $imageName);

             $article1->update(['titre'=>$request->titre, 'contenu'=>$request->contenu, 'image'=>$imageName, 'date_publier'=>$request->date_publier]);
          }

          
         session()->flash('success','Modification effectuée avec succées');

         $actualites = DB::table('actualites')->where('id_actualite',$id)->get();
        
        return view('Backend/pages/adminUpdateArticle',compact('actualites'));

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
