<?php
/**
 * Created by PhpStorm.
 * User: Khaldoun
 * Date: 2/27/2019
 * Time: 3:02 PM
 */

namespace App\Http\Controllers\Back;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (!Auth::user()) return redirect('/login');

        return view('back.index');
    }

}