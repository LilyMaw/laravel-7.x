<?php

namespace App\Contracts\Dao;

/**
 * Interface for user DAO
 */
interface UserDaoInterface
{
    /**
     * get user data from table
     * 
     * @return array $userList Todo list
     */
    public function getUserList();

    /**
     * Store user data to table
     *
     * @param request $request request with inputs
     * @param request $user user with inputs
     * @return Object $post saved user
     */
    public function saveUser($request, $user);
}