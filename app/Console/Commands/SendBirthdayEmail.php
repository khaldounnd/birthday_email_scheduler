<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendBirthdayEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email for employee birthdays';

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
     * @return mixed
     */
    public function handle()
    {
        $employees = Employee::all();
        foreach ($employees as $employee){

            $date = Carbon::createFromFormat('Y-m-d', $employee['birth_date']);
            if (!$date->isBirthday()){
                continue;
            }

            $age = $date->age;

            $emailData = [
                'first_name' => $employee['first_name'],
                'surname' => $employee['surname'],
                'birth_date' => $employee['birth_date'],
                'age' => $age
            ];

            $data = [
                'template' => 'email.birthday_email',
                'subject' => 'Happy Birthday!',
                'to' => ['email' => $employee['email']],
                'emailData' => $emailData,
            ];

            dispatch(new SendEmail($data));
        }

        return 'Emails Sent';
    }
}
