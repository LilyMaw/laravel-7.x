<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Phone;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

/**
 * This is Auth controller.
 * This handles Post CRUD processing.
 */
class AuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function login()
    {
        // User::create([
        //     'name' => "admin",
        //     'email' => "admin@gmail.com",
        //     'password' => Hash::make('12345678')
        // ]);

        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user-list');
        }
        return back()->withErrors(['Login failed']);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect()->route('login');
    }

    public function testOnetoOneR()
    {

        // create one admin
        // $user = User::create([
        //     'name' => 'master',
        //     'email' => 'master@gmail.com',
        //     'password' => Hash::make('password')
        //   ]);

        // $phone = new Phone();
        // $phone->phone = '09790987654';

        // User::find(3)->phones()->save($phone);

        // $user->roles()->attach([1, 2, 3]);

        // return User::find(1)->phones;
        // Role::create([
        //     'name' => 'admin'
        // ]);
        // Role::create([
        //     'name' => 'user'
        // ]);
        // Role::create([
        //     'name' => 'guest'
        // ]);

        // User::find(3)->roles()->attach([2,3]);
        // return User::find(1)->roles->toArray();
        // return Role::find(3)->users->toArray();

        // return User::with(['phones', 'roles'])->get()->toArray();
    }
}
