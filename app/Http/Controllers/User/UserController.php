<?php

namespace App\Http\Controllers\User;

use App\Contracts\Service\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Phone;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userService = $userServiceInterface;
    }
    public function index()
    {
        $data = $this->userService->getUserList();
        return view(
            'user.userList',
            ['userList' => $data]
        )->with('i');
        
        return view('user.userList', ['userList' => $data ]);
    }

    /**
     * To show create post view
     * 
     * @return View create user page
     */
    public function createUser()
    {
        return view('user.register');
    }

    /**
     * To confirm new user
     * @param UserRequest $request name, email, password
     * @return View register confirm page
     */
    public function confirmUser(UserRequest $request)
    {
        return view('user.registerConfirm')
            ->with('name', $request->name)
            ->with('email', $request->email)
            ->with('password', $request->password);
    }

    /**
     * To store new user
     * @param Request $request name, email, password
     * @return View user list
     */
    public function storeUser(Request $request, User $user)
    {
        $this->userService->saveUser($request, $user);

        return redirect()->route('user-list');
    }
}
