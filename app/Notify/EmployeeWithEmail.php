<?php

namespace App\Notify;

use App\Mail\BirthdayWish;
use App\Models\Employee;
use Illuminate\Support\Facades\Mail;

class EmployeeWithEmail
{
    /**
     * @var Employee
     */
    protected $employee;
    /**
     * @var string
     */
    protected $message;

    public function __construct(Employee $employee, string $message = '')
    {
        $this->employee = $employee;
        $this->message = $message;
    }

    public function send()
    {
        Mail::to($this->employee->email)
            ->send(new BirthdayWish($this->employee, $this->message ));
    }
}
