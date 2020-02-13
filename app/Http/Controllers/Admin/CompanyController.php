<?php

namespace App\Http\Controllers\Admin;

use App\Mail\CompanyCreated;
use App\Http\Requests\CompanyFormRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Model variable
     */
    protected $model;

    /**
     * Name of views folder
     */
    protected $view = 'company';

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->model = new Company;
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
        return view($this->view.'/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyFormRequest $request)
    {
        $companyFillables = $request->only($this->model->getFillables());

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos');
        }

        $companyFillables = $request->only($this->model->getFillables());
        if (isset($path)) {
            $companyFillables['logo'] = $path;
        }


        $company = $this->model->create($companyFillables);

        \Mail::to('admin@admin.com')->send(new CompanyCreated($company));

        return redirect(route('companies.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->model->findOrFail($id);

        return view($this->view.'/show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->model->findOrFail($id);

        return view($this->view.'/edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyFormRequest $request, $id)
    {
        $company = $this->model->findOrFail($id);

        if ($request->hasFile('logo')) {
            \Storage::delete($company['logo']);
            $path = $request->file('logo')->store('logos');
        }

        $companyFillables = $request->only($this->model->getFillables());
        if (isset($path)) {
            $companyFillables['logo'] = $path;
        }
        $company->update($companyFillables);

        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = $this->model->findOrFail($id);
        \Storage::delete($company['logo']);
        $company->delete();

        return;
    }
}
