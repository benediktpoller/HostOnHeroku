<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Jobs\SendEmailJob;

use App\Mail\MailNotification;
use App\Models\Contact;

class MailController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int $id
     * @return View
     */
    public function show()
    {
        $contact = new Contact([
            'name' => 'Benedikt Poller',
            'email' => 'benedikt.poller+contact@gmail.com'
        ]);
        $contact->save();


        SendEmailJob::dispatch((object) [
                'subject' => 'foo'
            ])
            ->delay(now()->addSeconds(10));

        return view('welcome');
    }
}