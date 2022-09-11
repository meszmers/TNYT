@extends('templates.index')


@include('partials.header')

@section('body')
    <script src="{{ URL::asset('js/create-test.js') }}"></script>
    <link href="{{ URL::asset('css/create-test.css') }}" rel="stylesheet">
    <div id="type-of-test" style="border: 5px solid black; padding: 20px">
        How many variations?
        <div style="display: flex; gap: 20px; justify-content: center">
            @foreach(config('menu')['tinder-image-count'] as $option)

                        <div style="width: 320px; height: 200px; text-align: center; background-color: #71e336; font-size: 60px; color: white">
                            <button style="width: 100%; height: 100%" onclick="load_main_content({{ $option['count'] }})" type="button">{{ $option['count'] }}</button>
                        </div>

            @endforeach
        </div>
    </div>
    <form id="image-upload" action="/create-test/tinder" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="test_case_id" value="1">
        <input type="text" name="main_title" placeholder="Title"/>
        <div class="images-upload" id="images">
            <!--this part will change-->
        </div>
        <div style="margin-top: 500px">
            <button type="submit">Uztaist testu</button>
        </div>
    </form>
@stop

<script type="text/javascript">
    function load_main_content(count)
    {
        document.getElementById('type-of-test').style.display = 'none';
        $('#images').load('/api/v1/image-uploads?count=' + count);
    }
</script>
