<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notification;
use auth;

class NotificationController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = DB::table('notifications')->where('id',$id)->get();

         $notification1 = Notification::where('id','=',$id);
         $notification1->update(['etat'=>1]);

           $notification2 = DB::table('notifications')->where('id',$id)->get();
         $type="";
         foreach ($notification2 as $notification2) {
             $type=$notification2->type;
         }

         if ($type=="demande_conge") {
            return redirect()->route('demande_conge');
         }else if ($type=="delegation") {
              return redirect()->route('accueil');
         }else if ($type=="demande_document") {
              return redirect()->route('demande_document');
         }else if ($type=="demande_entretien") {
              return redirect()->route('demande_entretien');
         }else if ($type=="suggestion") {
              return redirect()->route('suggestion');
         }else if ($type=="demande_salle") {
              return redirect()->route('demande_salle');
         }else{
            return redirect()->route('home');
         }
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
        //
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
