@extends('templates.index')


@include('partials.header')

@section('body')
    <div style="display: flex; justify-content: space-around">
        <a href="/home">
            <div class="test-container">
                <a style="color: white" href="/create-test/tinder">
                    <div style="text-align: center">
                        <div style="width: 200px; margin: 100px auto auto auto;">
                            <img width="200px" height="auto" src="{{URL::asset('/tinder-logo.svg')}}">
                        </div>

                        Tinder
                    </div>

                </a>
            </div>
        </a>


        <div class="test-container right">
            <a style="color: white" href="create-test/battle-royale">
                <div style="text-align: center">
                    <div style="width: 300px; margin: 100px auto auto auto;">
                        <img width="300px" height="auto" src="{{URL::asset('/battle-royale.svg')}}">
                        Battle Royale
                    </div>
                </div>
            </a>
        </div>


    </div>

@stop

<style>
    .test-container {
        background: linear-gradient(to right, #ff4b28, #ff228c);
        width: 45%;
        height: 600px;
    }
    .test-container.right {
        background: linear-gradient(to right, #ff228c, #ff4b28);
    }
</style>
