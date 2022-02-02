<?php

namespace App\Service;

use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Service\UserServiceInterface;

/**
 * Service class for user.
 */
class UserService implements UserServiceInterface
{
    private $userDao;
    /**
     * Class Constructor
     * @param UserDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }
    
    /**
     * get user data from table
     * 
     * @return array $userList Todo list
     */
    public function getUserList()
    {
        return $this->userDao->getUserList();
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
        return $this->userDao->saveUser($request, $user);
    }

}