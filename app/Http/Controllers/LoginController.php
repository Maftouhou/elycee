<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if ($request->isMethod('POST')) {
            
            $this->validate($request, [
                'username'  => 'required',
                'password'  => 'required'
            ]);
            
            $credencials = $request->only('username', 'password');
            
            if (Auth::attempt($credencials)) {
                
                $greeting   = 'Bonjour '.Auth::user()->username;
                
                return redirect('api/dashboard')->with(['message' => $greeting]);
            }else{
                
               return back()->withInput($request->only('login'));
            }
            
        }else{
            
            return view('auth.login');
        }
    }
    
    public function logout()
    {
        Auth::logout();
        
        return redirect('/');
    }
}
