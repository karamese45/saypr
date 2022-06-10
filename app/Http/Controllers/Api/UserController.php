<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;

class UserController extends Controller{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function all()
    {
        $companies = $this->userService->all();
        return response()->json($companies);
    }

    public function read($id)
    {
        $user = $this->userService->read($id);

        return response()->json($user);
    }

    public function create(UserRequest $request)
    {
        $user = $this->userService->create($request);

        return response()->json($user);
    }

    public function update(UserRequest $request, $id)
    {
        $result = $this->userService->update($request, $id);

        return response()->json($result);
    }

    public function delete($id)
    {
        $result = $this->userService->delete($id);

        return response()->json($result);
    }
}
