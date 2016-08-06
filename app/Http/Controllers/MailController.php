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
        $title      = 'Title';
        $content    = 'Content';

        Mail::send('emails.contact', ['title' => $title, 'content' => $content], function ($message)
        {
            $message->from('sandbox@sparkpostbox.com', 'Maftouh Hassane');
            $message->to('maftouh.hassane@gmail.com');
        });
        
        dd('done');
        # return response()->json(['message' => 'Request completed']);
    }
}
