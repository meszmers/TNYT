@extends('templates.index')


@include('partials.header')

@section('body')
    <form action="/test" id="test" method="post">
        <input id="test-case-id" type="hidden" name="test-case-id" value="{{ $test->id }}">
        <input id="image-id" type="hidden" name="image-id" value="">
        @csrf
        <div style="display: flex; flex-wrap: wrap; margin: auto; gap: 20px">
            @if(!empty($test))
                @foreach($test->images as $image)
                    @if(!empty($image->path) && !empty($image->image))
                        <img alt="" width="576" height="324" onclick="postAnswer({{ $image->id }})" src="{{ URL::asset($image->path) . '/' . $image->image }}">
                    @endif
                @endforeach
            @endif
        </div>
    </form>

@stop

<script type="text/javascript">
    function postAnswer(id)
    {
        document.getElementById('image-id').value = id;
        document.getElementById("test").submit();
    }
</script>


