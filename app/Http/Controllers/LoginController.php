<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Auth;

use Auth;

//use App\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        if ($request->isMethod('POST')) {
            
            $this->validate($request, [
                'username'  => 'required',
                'password'  => 'required'
            ]);
            
            $credencials = $request->only('username', 'password');
            
//            var_dump(Auth::attempt(['username' => $_POST['username'], 'password' => $_POST['password']]));
            var_dump( $credencials);
            
            if (Auth::attempt($credencials)) {
//                $reponse = 'Bonjour '.Auth::user()->username;
                
                return 'Login True';
//                return redirect('post')->with(['message' => sprintf($reponse)]);
            }else{
//                $reponse = 'Login ou mot de passe incorect';
                
                return 'Login false';
//                return back()->withInput($request->only('login'))->with(['message'  => sprintf($reponse)]);
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
