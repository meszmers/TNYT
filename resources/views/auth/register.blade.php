@extends('templates.index')


@include('partials.header')

@section('body')
    <div style="text-align: center; padding-top: 100px; margin: auto">
        <h1>
            Create new account
        </h1>
        <div>
            <form action="/register" method="post">
                <div>
                    <input height="50" type="text" name="name" placeholder="Name"
                           id="email">
                </div>
                <div>
                    <input height="50" type="email" name="email" placeholder="Email"
                           id="email">
                </div>
                <div>
                    <input height="50" type="password" name="password" placeholder="Password" id="password">
                </div>
                <div>
                    <input height="50" type="password" name="repeatPassword" placeholder="Password Repeat"
                           id="password">
                </div>
                @csrf
                <button>Register</button>
            </form>
            <div>
                Have account already? Login <a href="/login">here</a>
            </div>
        </div>
    </div>
@stop
