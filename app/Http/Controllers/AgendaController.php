<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\User;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
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
    public function store(User $user)
    {
        /*$this->validate(request(), ['d' => 'required', 'm' => 'required', 'y' => 'required']);
        
        Agenda::create([
          'd' => request('d'),
          'm' => request('m'),
          'y' => request('y'),
          'user_id' => $user->id
        ]);*/
        $user->addAgenda(request('d'));

        return back();
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
        return view('agendas.show', compact('agendas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
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
