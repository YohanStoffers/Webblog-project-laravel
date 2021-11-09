<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class weeklyDigest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $thisWeekArticles)
    {
        $this->user = $user;
        $this->articles = $thisWeekArticles;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('weeklyMailArticles')->with(
            ['user' => $this->user,
            'articles' => $this->articles,]
        );
    }
}
