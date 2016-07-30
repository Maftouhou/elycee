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
                
                return 'Login True';
//                return redirect('post');
            }else{
                
                return 'Login false';
//                return back()->withInput($request->only('login'));
            }
            
        }else{
            $file = file_get_contents('/uploads/users/users.json', true);
            $data = json_decode($file, true);
            
            foreach ($data['users']['teacher'] as $d_key => $d_val)
            {
                echo $d_val['username'];
            }
            
            return view('auth.login');
        }
    }
    
    public function logout()
    {
        
    }
}
