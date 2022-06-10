<?php

namespace App\Http\Repositories;

use App\Models\Company;

class CompanyRepository implements IRepositoryInterface {

    /**
     * @var Company
     */
    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function all()
    {
        return $this->company->get();
    }

    public function find($id)
    {
        return $this->company->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->company->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->company->findOrFail($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->company->findOrFail($id)->delete();
    }
}
