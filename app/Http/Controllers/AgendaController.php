<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\User;
use App\Http\Requests\StoreAgenda;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $agendas = User::find($id)->agendas;
        return view('agendas.index', compact('agendas'));
        //$user=User::find($user->id); // Just Eloquent
        //$agendas=$user->agendas;        
        //$agendas = User::find($user->id)->agendas;
       //$agendas = Agenda::where('user_id', '=', Auth::user()->id)->get();
        //return view('agendas.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agendas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgenda $request)
    {
        $agenda = Agenda::create($request->all());
       
        return redirect()->action('AgendaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agendas = User::find($id)->agendas;
        $roles = User::find($id)->roles;
        return view('agendas.show', compact('agendas', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $agenda = Agenda::find($id);
      $roles = Role::all();
      return view('agendas.edit',['agenda' => $agenda, 'roles' => $roles]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAgenda $request, $id)
    {
        $agenda = Agenda::find($id);
        $agenda->update($request->all());
        
        return redirect()->route('agendas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
}
