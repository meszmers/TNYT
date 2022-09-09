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


        <div class="test-container">
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
        background-color: #727273;
        width: 45%;
        height: 700px;
    }
</style>
