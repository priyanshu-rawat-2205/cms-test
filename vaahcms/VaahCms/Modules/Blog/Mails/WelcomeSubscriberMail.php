<?php  namespace VaahCms\Modules\Blog\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeSubscriberMail extends Mailable {

    use Queueable, SerializesModels;
    public $email;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function build()
    {
        return $this->view('blog::emails.welcomesubscriber');
    }

}
