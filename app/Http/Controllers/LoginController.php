<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        
        if ($request->isMethod('POST')) {
            
            $this->validate($request, [
                'username'  => 'required',
                'password'  => 'required'
            ]);
            
            $credencials = $request->only('name', 'password');
            if (Auth::attempt($credencials)) {
                $reponse = 'Bonjour '.Auth::user()->name;
                
                return redirect('post')->with(['message' => sprintf($reponse)]);
            }else{
                $reponse = 'Login ou mot de passe incorect';
                
                return back()->withInput($request->only('login'))->with(['message'  => sprintf($reponse)]);
            }
            
        }else{
            
//            return 'test';
            return view('auth.login');
        }
    }
    
    public function logout()
    {
        
    }
}
