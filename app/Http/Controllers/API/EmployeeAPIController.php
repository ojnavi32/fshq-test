<?php

namespace App\Http\Controllers\API;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeAPIController extends Controller
{
    public function list()
    {
        $employees = $this->getEmployeesByRole()->get();

        foreach ($employees as $employee) {
            $employee['company_name'] = $employee->company->name;
            $employee['firstname'] = $employee->user->firstname;
            $employee['lastname'] = $employee->user->lastname;
            $employee['email'] = $employee->user->email;
        }

        return datatables()->of($employees)->toJson();
    }

    public function coEmployees()
    {
        $userCompany = \Auth::user()->employee->company->name;

        $employees = $this->getEmployeesByRole()
                        ->whereHas('company', function ($q) use ($userCompany) {
                            $q->where('name', $userCompany);
                        })->get();

        foreach ($employees as $employee) {
            $employee['company_name'] = $employee->company->name;
            $employee['firstname'] = $employee->user->firstname;
            $employee['lastname'] = $employee->user->lastname;
            $employee['email'] = $employee->user->email;
        }

        return datatables()->of($employees)->toJson();
    }

    private function getEmployeesByRole()
    {
        return Employee::whereHas('user', function ($q) {
            $q->whereHas('roles', function ($qq) {
                $qq->where('name', 'employee');
            });
        });
    }
}
