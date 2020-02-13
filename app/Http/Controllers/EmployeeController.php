<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Name of views folder
     */
    protected $view = 'me';

    public function index()
    {
        return view($this->view.'/index');
    }

    public function profile()
    {

    }

    public function coWorker($id)
    {
        $coworker = Employee::findOrFail($id);

        return view($this->view.'/co-worker', compact('coworker'));
    }
}
