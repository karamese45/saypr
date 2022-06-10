<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserRequest;

class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function create(UserRequest $request)
    {
        $attributes = $request->all();

        return $this->userRepository->create($attributes);
    }

    public function read($id)
    {
        return $this->userRepository->find($id);
    }

    public function update(UserRequest $request, $id)
    {
        $attributes = $request->all();

        return $this->userRepository->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
