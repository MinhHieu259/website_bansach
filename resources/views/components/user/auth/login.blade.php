@extends('layouts.login-register-layout')
@section('title', 'Login')
@section('content')
    <div class="row">

        <div class="col-md-12">
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{\Illuminate\Support\Facades\Session::get('error')}}
                </div>
            @endif
            <form action="{{route('doLogin')}}" method="post">
                @csrf
                <div class="login-form">
                    <h4 class="login-title">Returning Customer</h4>
                    <p><span class="font-weight-bold">I am a returning customer</span></p>
                    <div class="row">
                        <div class="col-md-12 col-12 mb--15">
                            <label for="email">Enter your email address here...</label>
                            <input class="mb-0 form-control" type="email" name="email" id="email1"
                                   placeholder="Enter you email address here...">
                        </div>
                        <div class="col-12 mb--20">
                            <label for="password">Password</label>
                            <input class="mb-0 form-control" name="password" type="password" id="login-password" placeholder="Enter your password">
                        </div>
                        <div class="col-md-12 text-right">
                            <a href="{{ route('password.request') }}" class="text-primary">Forgot Password ?</a>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-outlined">Login</button>
                            <div class="social-auth-links text-center mb-3">
                                <p>- OR -</p>
                                <a href="{{route('login.facebook')}}" class="btn btn-block btn-primary">
                                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                                </a>
                                <a href="{{route('login.google')}}" class="btn btn-block btn-danger">
                                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
