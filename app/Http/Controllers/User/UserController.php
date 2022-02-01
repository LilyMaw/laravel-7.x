<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Phone;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function index()
    {
        $data = User::with(['phones', 'roles'])->get();
        return view(
            'user.userList',
            ['userList' => $data]
        )->with('i', (request()->input('page', 1) - 1) * 5);
        
        return view('user.userList', ['userList' => $data ]);
    }

    /**
     * To show create post view
     * 
     * @return View create page
     */
    public function createUser()
    {
        return view('user.register');
    }

    /**
     * To confirm new todo
     * @param UserRequest $request name, email, password
     * @return View todo list
     */
    public function confirmUser(UserRequest $request)
    {
        return view('user.registerConfirm')
            ->with('name', $request->name)
            ->with('email', $request->email)
            ->with('password', $request->password);
    }

    /**
     * To store new todo
     * @param Request $request name, instruction
     * @return View todo list
     */
    public function storeUser(Request $request, User $user)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        return redirect()->route('user-list');
    }
}
