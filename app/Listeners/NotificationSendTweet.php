<?php

namespace App\Listeners;

use App\Events\SendTweet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Mail;

class NotificationSendTweet
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendTweet  $event
     * @return void
     */
    public function handle(SendTweet $event)
    {
        $data = array('name' => $event -> user-> name,
        'email' => $event -> user -> email,
        'body' => 'Thank ypu for joining Twittor! i jope you will enjoy the loneliness!!');


        Mail::send('email', $data, function($message) use ($data) {
            $message -> to($data['email'])->subject('Thank you letter');
            $message -> from('noreply@artisanweb.net');
        });
    }
}
