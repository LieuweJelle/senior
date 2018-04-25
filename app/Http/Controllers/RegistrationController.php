<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
    
    public function store()
    {
        // Validate
        $this->validate(request(),[
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required|confirmed'
        ]);
        
        // Create and save User
        $user = User::create(
          request(['name', 'email', 'password'])
        );
        
        // Sign User in
        auth()->login($user);
        
        // Redirect 
        return redirect()->home(); //return redirect('/users')->with('success', 'User Created'); //UC 
        
    }
}
