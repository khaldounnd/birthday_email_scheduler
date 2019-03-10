<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function sendEmail(Request $request)
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

        return 'none';
    }
}
