<?php

namespace Database\Seeders;

use App\Http\Repositories\UserRepository;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRepository = new UserRepository(new User());

        $adminUser = $userRepository->create([
           'name' => 'Admin User',
           'email' => 'admin@saypr.com',
           'password' => Hash::make('admin'),
            'is_admin' => true,
        ]);

        $firstUser = $userRepository->create([
            'name' => 'First User',
            'email' => 'user@saypr.com',
            'password' => Hash::make('user'),
            'is_admin' => false,
        ]);
    }
}
