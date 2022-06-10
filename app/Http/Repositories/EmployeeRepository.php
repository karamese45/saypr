<?php

namespace App\Http\Repositories;

use App\Models\Employee;

class EmployeeRepository implements IRepositoryInterface {

    /**
     * @var Employee
     */
    protected $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function all()
    {
        return $this->employee->with('company')->get();
    }

    public function find($id)
    {
        return $this->employee->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->employee->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->employee->findOrFail($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->employee->findOrFail($id)->delete();
    }
}
