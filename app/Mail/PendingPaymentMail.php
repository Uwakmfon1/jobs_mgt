<?php

namespace App\Mail;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class PendingPaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     */
    public function __construct(
        public $user_id,
        // protected User $user,
        protected Job $job
    )
    {
        $this->user = Job::join('users','jobs.client_id','=','users.id')
                            ->where('users.id','=',$user_id)
                            ->select('jobs.created_at AS job_created_at','users.*','jobs.*')
                            ->first();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jobberyou@admin.com','Admin'),
            replyTo:[
                new Address('work.devhodu@gmail.com','Uwakmfon Udoh')
            ],
            subject: 'Pending Payment Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // $full_name = $this->user->name;
        $first_name = Str::before($this->user->name," ");
        return new Content(
            view: 'emails.template',
            with:[
                'first_name'=> $first_name,
                'client_name'=> $this->user->name,
                'job_title'=>$this->user->title
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
