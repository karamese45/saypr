<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Services\CompanyService;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function editView($id)
    {
        $company = $this->companyService->read($id);

        session()->flashInput($company->toArray());

        return view('company.add-edit')->with(['company' => $company]);
    }

    public function all()
    {
        $companies = $this->companyService->all();
        return view('company.list')->with(['companies' => $companies]);
    }

    public function add(CompanyRequest $request) {

        $this->companyService->create($request);

        return $this->all();
    }

    public function edit(CompanyRequest $request, $id) {

        $this->companyService->update($request, $id);

        return $this->all();
    }

    public function delete($id) {

        $this->companyService->create($id);

        return $this->all();
    }
}
