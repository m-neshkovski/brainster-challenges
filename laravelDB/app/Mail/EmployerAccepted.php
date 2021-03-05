<?php

namespace App\Mail;

use App\Models\Employer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployerAccepted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $e;
    public function __construct(Employer $employer)
    {
        $this->e = $employer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this);
        return $this
        ->from('test@neshkovski.com')
        ->view('emails.employer', [
            'company_name' => $this->e->company_name,
            'phone'=> $this->e->phone,
        ]);
    }
}
