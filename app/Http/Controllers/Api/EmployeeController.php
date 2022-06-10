<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Services\EmployeeService;

class EmployeeController extends Controller{

    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function all()
    {
        $companies = $this->employeeService->all();
        return response()->json($companies);
    }

    public function read($id)
    {
        $employee = $this->employeeService->read($id);

        return response()->json($employee);
    }

    public function create(EmployeeRequest $request)
    {
        $employee = $this->employeeService->create($request);

        return response()->json($employee);
    }

    public function update(EmployeeRequest $request, $id)
    {
        $result = $this->employeeService->update($request, $id);

        return response()->json($result);
    }

    public function delete($id)
    {
        $result = $this->employeeService->delete($id);

        return response()->json($result);
    }
}
