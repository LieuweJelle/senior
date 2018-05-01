<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
      $users = User::all();
      return view('users.index', compact('users'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', //|unique:users
            'telephone' => 'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
            'street' => 'required|string|max:255',
            'streetnumber' => 'required|string|max:255',
            'zipcode' => 'required|string|max:6',
            'place' => 'required|string|max:255',
            'intro' => 'required',
        ]);
       
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->telephone = $request->input('telephone');
        $user->street = $request->input('street');
        $user->streetnumber = $request->input('streetnumber');
        $user->zipcode = $request->input('zipcode');
        $user->place = $request->input('place');
        $user->intro = $request->input('intro');
        $user->save();

        if(!empty($request['check_list'])) {
            $user = User::find($user->id);
            foreach($request['check_list'] as $selected) {
                $user->roles()->attach($selected); 
            }
        }

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
        return view('users.show2',['user' => $user, 'roles' => $roles]);
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
    public function update(Request $request, $id)
    {                

        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255', //|unique:users
            'telephone' => 'required|string|max:10',
            //'password' => 'required|string|min:6|confirmed',
            'street' => 'required|string|max:255',
            'streetnumber' => 'required|string|max:255',
            'zipcode' => 'required|string|max:6',
            'place' => 'required|string|max:255',
            'intro' => 'required',
        ]);
        /*$user->update($request->all());*/
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        //$user->password = $request->input('password');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->telephone = $request->input('telephone');
        $user->street = $request->input('street');
        $user->streetnumber = $request->input('streetnumber');
        $user->zipcode = $request->input('zipcode');
        $user->place = $request->input('place');
        $user->intro = $request->input('intro');
        $user->save();
        
        $user->roles()->detach();
        if(!empty($request['check_list'])) {
           $user = User::find($id);
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
