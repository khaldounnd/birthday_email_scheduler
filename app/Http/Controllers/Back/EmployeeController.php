<?php
/**
 * Created by PhpStorm.
 * User: Khaldoun
 * Date: 3/9/2019
 * Time: 8:43 AM
 */

namespace App\Http\Controllers\Back;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController Extends Controller
{

    protected $repository;

    /**
     * Create a new controller instance.
     * @param EmployeeRepository $repository
     */
    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::paginate(25);
        return view('back.employees.index', ['employees' => $employees]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('back.employees.create');
    }

    /**
     * @param StoreEmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreEmployeeRequest $request)
    {
        $inputs = $request->all();
        $this->repository->store($inputs);

        return redirect(route('employees.index'));
    }

    /**
     * @param $employeeId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($employeeId)
    {
        $employee = Employee::where('id', $employeeId)->first();
        return view('back.employees.edit', ['employee' => $employee]);
    }

    /**
     * @param Request $request
     * @param $employeeId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $employeeId)
    {
        $inputs = $request->all();
        $employee = $this->repository->update($inputs, $employeeId);

        return view('back.employees.edit', compact('employee'));
    }

    /**
     * @param $employeeId
     * @return string
     */
    public function destroy($employeeId)
    {
        $employee = Employee::where('id', $employeeId)->first();
        $employee->delete();

        return back();
    }

}