<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;

use Mail;

class MailController extends Controller
{
    
    public function contact()
    {
        
        return view('front.contact');
    }
    /**
     * Send an e-mail to the Administrator.
     *
     * @param  Request  $request
     * @return Response
     */
    public function sendEmail(Request $request)
    {
        $nom        = $request->nom;
        $prenom     = $request->prenom;
        $title      = $request->titre;
        $email      = $request->email;
        $message    = $request->message;
        
        Mail::send('emails.contact', [
            'nom'       => $nom,
            'prenom'    => $prenom,
            'email'     => $email,
            'title'     => $title,
            'content'   => $message
                ], function($m){
            $m->from('mafthib@gmail.com', 'Elycée Contact');
            $m->to('mafthib@gmail.com', 'Mafthib');
            $m->subject('Contact from E-Lycée');
        });
        
        return redirect('/');
    }
}
