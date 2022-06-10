<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Services\CompanyService;

class CompanyController extends Controller{

    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function all()
    {
        $companies = $this->companyService->all();
        return response()->json($companies);
    }

    public function read($id)
    {
        $company = $this->companyService->read($id);

        return response()->json($company);
    }

    public function create(CompanyRequest $request)
    {
        $company = $this->companyService->create($request);

        return response()->json($company);
    }

    public function update(CompanyRequest $request, $id)
    {
        $result = $this->companyService->update($request, $id);

        return response()->json($result);
    }

    public function delete($id)
    {
        $result = $this->companyService->delete($id);

        return response()->json($result);
    }
}
