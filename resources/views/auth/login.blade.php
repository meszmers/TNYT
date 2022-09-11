@extends('templates.index')


@include('partials.header')

@section('body')
    <div style="text-align: center; padding-top: 100px; margin: auto">
        <h1>
            Sign In Your Account
        </h1>
        <div style="margin: auto; text-align: center; width: 200px; margin-bottom: 50px">
            <a href="{{ url('auth/google') }}">
                <img alt="" width="250px" src="../../google_login.png">
            </a>
        </div>
        <div>
            <form action="/login" method="post">
                <div>
                    <input height="50" type="email" name="email" value="{{ !empty($email) ? $email : '' }}"
                           placeholder="email"
                           id="email">
                </div>
                <div>
                    <input height="50" type="password" name="password" placeholder="password" id="password">
                </div>
                @csrf
                <button>Login</button>
            </form>
            <div>
                Dont have account? Register <a href="/register">here</a>
            </div>
        </div>
    </div>
@stop
