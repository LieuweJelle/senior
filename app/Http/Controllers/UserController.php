<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
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
      //return view('users.index', ['users' => $users]);
      return view('users.index', compact('users'));
      
      //$users = DB::table('users')->get();
      //return $users; //json output to browser
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
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'telephone' => 'required|min:10',
            'street' => 'required',
            'streetnumber' => 'required',
            'zipcode' => 'required|max:6',
            'place' => 'required',
       ]);
       
        $user = new User;
        $user->role_id = auth()->role()->id; //$request->input('role_id');
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
        
        $user->save();
        
        // User::create(request(['name', 'email', .....])
        
        $role_id = $user->id;
        
       return redirect('/users')->with('success', 'User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //$user = User::find($user->id);
        $roles = Role::all();
        //$user->roles()->attach($id); //a new row will be added to role_user table, with $role_id and $user_id values.
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
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'telephone' => 'required',
            'street' => 'required',
            'streetnumber' => 'required',
            'zipcode' => 'required',
            'place' => 'required',
        ]);
        
        //if() {
          
        //} else {
        $user->update($request->all());
  
        /*$user = User::find($user->id);
        $user->role_id = auth()->role()->id; //$request->input('role_id');
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
        $user->save();*/
        
        //}

      //$user->update($request->all());
        return redirect()->route('users.index'); //->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::find($user_id);

        // Check for correct user
        if(auth()->user()->id !==$user->user_id){
            return redirect('/users')->with('error', 'Unauthorized Page');
        }

        $user->delete();
        return redirect('/users')->with('success', 'User Removed');
    }
}
