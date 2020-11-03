<?php

namespace App\Listeners;

use App\Events\SendTweet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

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
        'body' => 'Thank you for joining Twittor! i hope you will enjoy the loneliness!!');


        Log::channel('stack')->info('email', $data, function($message) use ($data) {
            $message -> to($data['email'])->subject('Thank you letter');
            $message -> from('noreply@artisanweb.net');
        });
    }
}
