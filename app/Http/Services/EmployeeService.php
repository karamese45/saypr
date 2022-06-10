<?php

namespace App\Http\Services;

use App\Http\Repositories\EmployeeRepository;
use App\Http\Requests\EmployeeRequest;

class EmployeeService
{
    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function all()
    {
        return $this->employeeRepository->all();
    }

    public function create(EmployeeRequest $request)
    {
        $attributes = $request->all();

        return $this->employeeRepository->create($attributes);
    }

    public function read($id)
    {
        return $this->employeeRepository->find($id);
    }

    public function update(EmployeeRequest $request, $id)
    {
        $attributes = $request->all();

        return $this->employeeRepository->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->employeeRepository->delete($id);
    }
}
