<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Jobs\SendEmailJob;

use App\Mail\MailNotification;
use App\Models\Contact;

class StatusController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int $id
     * @return View
     */
    public function index()
    {

        return view('welcome');
    }
}
