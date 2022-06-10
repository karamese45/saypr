<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository implements IRepositoryInterface {

    /**
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->get();
    }

    public function find($id)
    {
        return $this->user->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->user->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->user->findOrFail($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->user->findOrFail($id)->delete();
    }
}
