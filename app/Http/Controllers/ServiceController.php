<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Service;
use auth;

class ServiceController extends Controller
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
        Service::create(['nom'=>$request->nom, 'description'=>$request->description, 'id_direction'=>$request->id_direction, 'responsable'=>$request->responsable]);

     session()->flash('success','Service ajouté avec succès');

        

        return redirect()->route('service');
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
         $direction = DB::table('directions')->where('supprimer',0)->get();
         $service = DB::table('services')->where('id',$id)->get();
         $personnel =DB::table('users')
         ->where([['id_role',2]])
         ->orderBY('name')
        ->get();
        return view('pages.service_edit',compact('service','direction','personnel'));
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
         $service1 = Service::where('id','=',$id);

        if (isset($request->sup)) {
          //suppression
           $service1 = Service::where('id','=',$id);
         
              $service1->update(['supprimer'=>1]);
         

          
         session()->flash('success','Suppression effectuée avec succées');

         return redirect()->route('service');
         }else{

             $this->validate($request,['nom'=>'required']);

              $service1->update(['nom'=>$request->nom, 'description'=>$request->description,'id_direction'=>$request->id_direction,'responsable'=>$request->responsable]);

              session()->flash('success','modification effectuée avec succées');

         return redirect()->route('Service.edit',$id);
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
