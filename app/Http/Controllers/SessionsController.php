<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct(){
      $this->middleware('guest')->except(['destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }
    
    public function store()
    {
        // Attempt to authenticate the User. If not, redirect back
        if(!auth()->attempt(request(['email', 'password'])))
        {
          return back()->withErrors([
            'message' => 'Please check your credentials and try again'
          ]);
        }
        
        // If so, sign User in
        //auth()->login($user);
        
        // Redirect 
        return redirect('/users')->with('success', 'User Created'); //UC return redirect()->home();
    }
    
    public function destroy()
    {
        auth()->logout();
        return redirect('/users')->with('success', 'User Logged out');
    }

}
