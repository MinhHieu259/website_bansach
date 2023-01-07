<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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

    //Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //Google Callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->registerOrLoginUSer($user);
        return redirect()->route('home');
    }

    //Facebook login
    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //Facebook Callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->registerOrLoginUSer($user);
        return redirect()->route('home');
    }

    public function registerOrLoginUSer($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        $role = Role::where('name', 'USER')->first();
        if(!$user)
        {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->address = '';
            $user->phone = '';
            $user->password = '';
            $user->role_id = $role->id;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        Auth::login($user);
        if(Auth::user()->role['name'] == 'ADMIN'){
            return redirect('/admin/dashboard');
        }else if(Auth::user()->role['name'] == 'USER'){
            return redirect('/');
        }
    }
}
