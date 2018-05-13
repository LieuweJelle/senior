<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\User;
use App\Role;
use App\Http\Requests\StoreAgenda;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$agendas = Agenda::all();
        /*$users = User::all();
        $agendas = $users->agendas;
        $roles = $users->roles;
        return view('agenda.index', compact('users', 'agendas', 'roles'));*/

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
     * @param  \Illuminate\Http\Request  $request \\StoreAgenda
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $elem1 = $request->input('dpt1');
        $elem2 = $request->input('dpt2');
        $d = substr($elem1,0,2);
        $m = substr($elem1,3,2);
        $y = substr($elem1,6,4);
        $start = substr($elem1,11,5);
        $stop = substr($elem2,11,5);
        $role_id = $request->input('radio_list');
        $user_id = $request->input('hidden');

        $agenda = new Agenda();
        $agenda->d = $d;
        $agenda->m = $m;
        $agenda->y = $y;
        $agenda->start = $start;
        $agenda->stop = $stop;
        $agenda->user_id = $user_id;
        $agenda->role_id = $role_id;
        $agenda->save();

        $user = User::find($user_id);
        $agendas = $user->agendas;
        $roles = $user->roles;
        return view('agendas.show', compact('agendas', 'roles', 'user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $agendas = $user->agendas;
        $roles = $user->roles;
        return view('agendas.show', compact('agendas', 'roles', 'user'));
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
        $d = (strlen($agenda->d)==1) ? '0'.$agenda->d : $agenda->d;
        $m = (strlen($agenda->m)==1) ? '0'.$agenda->m : $agenda->m;
        $record1 = $d.'-'.$m.'-'.$agenda->y.' '.substr($agenda->start,0,5);
        $record2 = $d.'-'.$m.'-'.$agenda->y.' '.substr($agenda->stop,0,5);
        $user = User::find($agenda->user_id);
        $agendas = $user->agendas;
        $roles = $user->roles;
        return view('agendas.edit', compact('agenda', 'agendas', 'roles', 'user', 'record1', 'record2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $elem1 = $request->input('dpt1');
        $elem2 = $request->input('dpt2');
        $d = substr($elem1,0,2);
        $m = substr($elem1,3,2);
        $y = substr($elem1,6,4);
        $start = substr($elem1,11,5);
        $stop = substr($elem2,11,5);
        $role_id = $request->input('radio_list');
        $user_id = $request->input('hidden');
        
        $agenda = Agenda::find($id);
        $agenda->d = $d;
        $agenda->m = $m;
        $agenda->y = $y;
        $agenda->start = $start;
        $agenda->stop = $stop;
        $agenda->user_id = $user_id;
        $agenda->role_id = $role_id;
        $agenda->save();
        
        $user = User::find($user_id);
        $agendas = $user->agendas;
        $roles = $user->roles;
        return view('agendas.show', compact('agendas', 'roles', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $agenda = Agenda::find($id);
        $d = (strlen($agenda->d)==1) ? '0'.$agenda->d : $agenda->d;
        $m = (strlen($agenda->m)==1) ? '0'.$agenda->m : $agenda->m;
        $record1 = $d.'-'.$m.'-'.$agenda->y.' '.substr($agenda->start,0,5);
        $record2 = $d.'-'.$m.'-'.$agenda->y.' '.substr($agenda->stop,0,5);
        $user_id = $agenda->user_id;
        $user = User::find($user_id);
        $roles = $user->roles;
        return view('agendas.delete', compact('agenda', 'roles', 'user', 'record1', 'record2'));
    }
    
    public function destroy(Request $request, $id)
    {
        $agenda = Agenda::find($id);
        $user_id = $agenda->user_id;
        $agenda->delete();
        $user = User::find($user_id);
        $agendas = $user->agendas;
        $roles = $user->roles;
        return view('agendas.show', compact('agendas', 'roles', 'user'));
        
    }
}