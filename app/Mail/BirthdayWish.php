<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BirthdayWish extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Employee
     */
    public $employee;
    /**
     * @var string
     */
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employee $employee, string $message)
    {
        $this->employee = $employee;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.wishes.birthday');
    }
}
