<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Http\Requests\StoreUser; //!!!!

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        //$this->middleware('auth', ['only', 'index']);
        //$this->middleware('auth', ['except', 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return session('message');
        $users = \App\User::with('roles')->get(); //User::all();
        return view('users.index', compact('users'));
    }

    public function indexall()
    {
        $users = \App\User::with('roles')->get(); //User::all();
        return view('users.indexall', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request) 
    {
        //$user = User::create($request->all(), ['password' => Hash::make($request['password'])]);  // geen fout! werkt niet.
         $user = User::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'name' => $request['name'],
            'email' => $request['email'],
            'telephone' => $request['telephone'],
            'password' => Hash::make($request['password']),
            'street' => $request['street'],
            'streetnumber' => $request['streetnumber'],
            'zipcode' => $request['zipcode'],
            'place' => $request['place'],
            'intro' => $request['intro'],
        ]);
        if(!empty($request['check_list'])) {
            foreach($request['check_list'] as $selected) {
                $user->roles()->attach($selected); 
            }
        }

        session()->flash('message', 'Bedankt voor het aanmaken van een Vrijwilliger'); // request()->session();
        
        return redirect()->action('UserController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();
        return view('users.show',['user' => $user, 'roles' => $roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::find($id);
      $roles = Role::all();
      return view('users.edit',['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, $id) 
    {                
        $user = User::find($id);
        $user->update($request->all());
        
        $user->roles()->detach();
        if(!empty($request['check_list'])) {
            foreach($request['check_list'] as $selected) {
                $user->roles()->attach($selected); 
            }
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.delete',['user' => $user, 'roles' => $roles]);
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'User Removed');
    }
}
