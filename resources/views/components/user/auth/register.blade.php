@extends('layouts.login-register-layout')
@section('title', 'Register')
@section('content')
    <div class="row">

        <div class="col-md-12"> <!-- Login Form s-->
            <form action="{{route('doRegister')}}" method="post">
                @csrf
                <div class="login-form"><h4 class="login-title">New Customer</h4>
                    <p><span class="font-weight-bold">I am a new customer</span></p>
                    <div class="row">
                        <div class="col-md-12 col-12 mb--15"><label for="email">Full Name</label> <input
                                class="mb-0 form-control" name="name" value="{{old('name')}}" type="text" id="name" placeholder="Enter your full name">
                        </div>
                        <div class="col-12 mb--20"><label for="email">Email</label> <input class="mb-0 form-control"
                                                                                           value="{{old('email')}}"
                                                                                           type="email" id="email" name="email"
                                                                                           placeholder="Enter Your Email Address Here..">
                        </div>
                        <div class="col-lg-6 mb--20"><label for="password">Password</label> <input
                                class="mb-0 form-control" type="password" value="{{old('password')}}" name="password" id="password"
                                placeholder="Enter your password"></div>
                        <div class="col-lg-6 mb--20"><label for="password">Repeat Password</label> <input
                                class="mb-0 form-control" name="retypepassword" value="{{old('retypepassword')}}" type="password" id="repeat-password"
                                placeholder="Repeat your password"></div>
                        <div class="col-md-12"><button type="submit" class="btn btn-outlined">Register</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
