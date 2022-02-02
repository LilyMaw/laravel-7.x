<?php

namespace App\Dao;

use App\Contracts\Dao\UserDaoInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

/**
 * Service class for user.
 */
class UserDao implements UserDaoInterface
{
    /**
     * Class Constructor
     * @param UserDaoInterface
     * @return
     */
    public function __construct()
    {
    }

     /**
     * get user data from table
     * 
     * @return array $userList Todo list
     */
    public function getUserList()
    {
        return User::with(['phones', 'roles'])->get();
    }

    /**
     * Store user data to table
     *
     * @param request $request request with inputs
     * @param request $user user with inputs
     * @return Object $post saved user
     */
    public function saveUser($request, $user)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        return $user;
    }
}