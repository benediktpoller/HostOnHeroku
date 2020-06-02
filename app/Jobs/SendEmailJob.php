<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $config;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $to_name = 'Benedikt Poller';
        $to_email = 'benedikt.poller+monitor@gmail.com';

        $data = array(
            'name' => "Ogbonna Vitalis(sender_name)", 
            'body' => "A test mail"
        );

        Mail::send('emails.down', $data, function($message) use ($to_name, $to_email) {
            $message
                ->to($to_email, $to_name)
                ->subject($this->config->subject);
            $message->from('benedikt.poller+from@gmail.com', env('APP_NAME', 'Laravel'));
        });

        /*
                Mail::to('benedikt.poller@gmail.com')
        ->from('benedikt.poller@gmail.com', env('APP_NAME', 'Laravel'))
        ->send(new MailNotification());

        */
    }
}
