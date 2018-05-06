<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\User;
use App\Role;
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
    public function index()
    {
        /*$agendas = Agenda::all();
        $roles = Role::all();
        //$user = User::all();
        return view('agendas.index', compact('agendas', 'roles', 'user'));*/
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
        $user_id = $request->input('hidden');//auth()->id();
        //dd($d.'-'.$m.'-'.$y.', '.$start.' '.$stop.': '.$role_id.',  '.$user_id);
        //$agenda = Agenda::create($request->all());
        $agenda = new Agenda();
        $agenda->d = $d;
        $agenda->m = $m;
        $agenda->y = $y;
        $agenda->start = $start;
        $agenda->stop = $stop;
        $agenda->user_id = $user_id;
        $agenda->role_id = $role_id;
        $agenda->save();
        //return redirect()->action('AgendaController@show');
        $agendas = User::find($user_id)->agendas;
        $roles = User::find($user_id)->roles;
        $user = User::find($user_id);
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
        $agendas = User::find($id)->agendas;
        $roles = User::find($id)->roles;
        $user = User::find($id);
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
      $roles = Role::all();
      $role = $agenda->role_id;
      $user = $agenda->user_id;
      return view('agendas.edit', compact('agenda', 'roles', 'role', 'user', 'record1', 'record2'));

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
        $user_id = $request->input('hidden');//auth()->id();
        //dd($d.'-'.$m.'-'.$y.', '.$start.' '.$stop.': '.$role_id.',  '.$user_id);
        //$agenda = Agenda::create($request->all());
        $agenda = Agenda::find($id);
        $agenda->d = $d;
        $agenda->m = $m;
        $agenda->y = $y;
        $agenda->start = $start;
        $agenda->stop = $stop;
        $agenda->user_id = $user_id;
        $agenda->role_id = $role_id;
        $agenda->save();
        //$agenda->update($request->all());
        
        return redirect()->route('agendas.index');

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
      $roles = Role::all();
      $user = $agenda->user_id;
      return view('agendas.delete', compact('agenda', 'roles', 'user', 'record1', 'record2'));
        /*$agendas = User::find($id)->agendas;
        $roles = User::find($id)->roles;
        $user = User::find($id);
        return view('agendas.delete', compact('agendas', 'roles', 'user'));*/
        
    }
    public function destroy(Request $request, $id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();
        $user_id = $request->input('hidden');
        $agendas = User::find($user_id)->agendas;
        $roles = User::find($user_id)->roles;
        $user = User::find($user_id);
        return view('agendas.show', compact('agendas', 'roles', 'user'));
        
    }
}
