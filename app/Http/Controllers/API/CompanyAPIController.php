<?php

namespace App\Http\Controllers\API;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyAPIController extends Controller
{
    public function list()
    {
        return datatables()->of(Company::get())->toJson();
    }
}
