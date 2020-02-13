<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Employee;
use App\Models\Company;

use App\Http\Requests\EmployeeFormRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Variable for employee model
     */
    protected $model;

    /**
     * Variable for company model
     */
    protected $company;

    /**
     * Variable for user model
     */
    protected $user;

    /**
     * Name of views folder
     */
    protected $view = 'employee';

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->model = new Employee;
        $this->company = new Company;
        $this->user = new User;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->view.'/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = $this->company->get();
        return view($this->view.'/create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeFormRequest $request)
    {
        $request->merge(['password' => Str::random(10)]);
        $employeeFillables = $request->only($this->model->getFillables());
        $userFillables = $request->only($this->user->getFillables());

        $employee = $this->user->create($userFillables);
        $employee->assignRole('employee');
        $employee->employee()->create($employeeFillables);

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = $this->getEmployee($id);
        return view($this->view.'/show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->getEmployee($id);
        $companies = $this->company->get();

        return view($this->view.'/edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeFormRequest $request, $id)
    {
        $employee = $this->getEmployee($id);
        $userFillables = $request->only($this->user->getFillables());
        $employeeFillables = $request->only($this->model->getFillables());

        $employee->update(['company_id', $request['company_id']]);
        $employee->user()->update($userFillables);

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->getEmployee($id)->delete();
        return;
    }

    private function getEmployee($id)
    {
        return $this->model->findOrFail($id);
    }
}
