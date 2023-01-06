@extends('layouts.login-register-layout')
@section('title', 'Login')
@section('content')
    <div class="row">

        <div class="col-md-12">
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
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outlined">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
