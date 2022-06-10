<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\EmployeeRequest;
use App\Http\Services\CompanyService;
use App\Http\Services\EmployeeService;

class EmployeeController extends Controller
{

    protected $employeeService;
    protected $companyService;

    public function __construct(EmployeeService $employeeService, CompanyService $companyService)
    {
        $this->employeeService = $employeeService;
        $this->companyService = $companyService;
    }

    public function addView()
    {
        $companies = $this->companyService->all();

        $companySelectBox = $companies->map(function($company) {
            return ['label' => $company->name, 'value' => $company->id];
        });
        return view('employee.add-edit')->with(['companySelectBox' => $companySelectBox]);
    }

    public function editView($id)
    {
        $employee = $this->employeeService->read($id);

        session()->flashInput($employee->toArray());

        $companies = $this->companyService->all();

        $companySelectBox = $companies->map(function($company) {
            return ['label' => $company->name, 'value' => $company->id];
        });
        return view('employee.add-edit')->with(['companySelectBox' => $companySelectBox, 'employee' => $employee]);
    }

    public function add(EmployeeRequest $employeeRequest)
    {
        $this->employeeService->create($employeeRequest);

        return $this->all();
    }

    public function edit(EmployeeRequest $employeeRequest, $id)
    {
        $this->employeeService->update($employeeRequest, $id);

        return $this->all();
    }

    public function all()
    {
        $employees = $this->employeeService->all();

        return view('employee.list')->with(['employees' => $employees]);
    }

    public function delete($id) {

        $this->employeeService->create($id);

        return $this->all();
    }
}
