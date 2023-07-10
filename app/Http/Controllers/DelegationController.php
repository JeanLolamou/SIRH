<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Delegation;
use App\User;
use auth;

class DelegationController extends Controller
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
       if (!deja_delegue(Auth::user()->id,$request->delegue)) {


           Delegation::create(['id_delegue'=>$request->delegue, 'id_delegant'=>Auth::user()->id, 'date'=> date("Y-m-d")]);

         notifier($request->delegue,"Vous avez réçu une delegation de la part d'un autre utilisateur","delegation");
          $utilisateur=User::where('id', $request->delegue)->first();

            try {

            $utilisateur->notify(New AlertNotification());
            // Mail::to(mail_user($request->responsable))->send(new MailConge($data));

        } catch (\Exception $e) {

    
}

        

         session()->flash('success','Delegation ajoutée avec succés');
       }else{
         session()->flash('error','Vous avez déja délégué cette personne');

       }

         $personnel =DB::table('users')->where('id','!=',Auth::user()->id)->get();
        $delegation =DB::table('delegations')->where('id_delegant',Auth::user()->id)->get();
            return view('pages.delegation',compact('personnel','delegation'));
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
         $delegation1 = Delegation::where('id','=',$id);
         
              $delegation1->update(['supprimer'=>1]);

              session()->flash('success','Delegation retirée avec succés');

        

        return redirect()->route('delegation');
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
