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
            
            foreach ($data['users'] as $d_key => $d_val)
            {
                    # var_dump($data['users'][$d_key]);
                $class = $d_val[];
                dd($d_key);
                
                foreach ($class as $c_key => $c_value)
                {
                    # dd($c_value['username']);
                }
//                $result = json_decode($class, true);
//                dd($data['users'][$d_key]);
            }
            
            return view('auth.login');
        }
    }
    
    public function logout()
    {
        
    }
}
