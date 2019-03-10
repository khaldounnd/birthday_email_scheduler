<?php
/**
 * Created by PhpStorm.
 * User: Khaldoun
 * Date: 2/27/2019
 * Time: 3:02 PM
 */

namespace App\Http\Controllers\Back;


use App\Http\Controllers\Controller;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class DashboardController extends Controller
{

    /**
     * Dashboard Main Page and Calendar
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (!Auth::user()) return redirect('/login');

        $data = Employee::all();
        if ($data->count()) {
            $eventColor = '#ff0000';
            foreach ($data as $key => $value) {
                $start_date = Carbon::parse(($value->birth_date))->addYears(-1);
                $diff = $start_date->diffInYears(Carbon::now()->addDay(-1));

                //Getting all years from now up until average life expectancy in Europe
                $years = 84 - $diff;
                for ($i = 0; $i<$years; $i++) {
                    $date = $start_date->addYear();
                    $event = Calendar::event(
                        $value->first_name . ' ' . $value->surname,
                        false,
                        $date,
                        $date,
                        null,
                        [
                            'textColor' => '#FFF',
                            'color' => $eventColor,
                        ]
                    );

                    $calendar = Calendar::addEvent($event);

                }
            }
        }

        return view('back.dashboard.index', compact('calendar'));
    }

}