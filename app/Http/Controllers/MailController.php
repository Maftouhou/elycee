<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

class MailController extends Controller
{
    /**
     * Send an e-mail to the Administrator.
     *
     * @param  Request  $request
     * @return Response
     */
    public function sendEmail(Request $request)
    {
        $user = [];
        Mail::send('email.contact', ['user' => $user], function ($m) use ($user) {
            $m->from('postmaster@sandbox36e8ee66196d4812899821ef23049652.mailgun.org', 'Your Application');

            $m->to('maftouh.hassane@gmail.com', 'Maftouh')->subject('Your This is a message !');
        });
        
        dd('Stop');
    }
}
