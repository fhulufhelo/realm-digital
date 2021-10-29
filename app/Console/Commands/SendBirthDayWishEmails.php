<?php

namespace App\Console\Commands;

use App\Notifications\BirthDayWish;
use App\Repositories\EmployeesRepository;
use Illuminate\Console\Command;

class SendBirthDayWishEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send employee';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a birth day wish email to a employee';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(EmployeesRepository $repository)
    {
        $employees = $repository->get();

        foreach ($employees as $employee) {
            if ($employee->shouldReceiveBirthdayWish()) {
                $employee->notify(new BirthDayWish($employee));
            }
        }
    }

}
