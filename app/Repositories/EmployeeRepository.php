<?php
/**
 * Created by PhpStorm.
 * User: Khaldoun
 * Date: 3/9/2019
 * Time: 8:44 AM
 */

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{

    /**
     * @param $inputs
     */
    public function store($inputs)
    {
        $originalDate = $inputs['birth_date'];
        $inputs['birth_date'] = date('Y-m-d', strtotime($originalDate));

        $employee = new Employee();
        $employee->fill($inputs);
        $employee->save();
    }

    /**
     * @param $inputs
     * @param $employeeId
     * @return Employee
     */
    public function update($inputs, $employeeId){

        $originalDate = $inputs['birth_date'];
        $inputs['birth_date'] = date('Y-m-d', strtotime($originalDate));

        $employee = Employee::where('id', $employeeId)->first();

        $employee->update($inputs);
        $employee->save();

        return $employee;
    }



}