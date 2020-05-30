<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show()
    {
        $to_name = 'Benedikt Poller';
        $to_email = 'benedikt.poller@gmail.com';

        $data = array(
            'name' => "Ogbonna Vitalis(sender_name)", 
            'body' => "A test mail"
        );

        Mail::send('emails.down', $data, function($message) use ($to_name, $to_email) {
            $message
                ->to($to_email, $to_name)
                ->subject('Monitor is DOWN');
            $message
                ->from('benedikt.poller@gmail.com','Monitor');
        });

        return view('welcome');
    }
}