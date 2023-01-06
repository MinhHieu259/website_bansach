<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('components.user.auth.login');
    }

    public function registerPage()
    {
        return view('components.user.auth.register');
    }

    public function doRegister(RegisterRequest  $request)
    {
        $data = $request->validated();
        $role = Role::where('name', 'USER')->first();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => null,
            'address' => null,
            'avatar' => null,
            'role_id' => $role->id
        ]);
        return redirect('login')->with('message', 'Register Account Successfully');
    }

    public function doLogin(LoginRequest $request)
    {
        $data = $request->validated();
        $login = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        if (Auth::attempt($login)) {
            if(Auth::user()->role['name'] == 'ADMIN'){
                return redirect('/admin/dashboard');
            }else if(Auth::user()->role['name'] == 'USER'){
                return redirect('/');
            }
        } else {
            return redirect('/login')->with('status', 'Email or Password Error');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
