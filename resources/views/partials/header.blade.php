<link href="{{ URL::asset('css/header.css') }}" rel="stylesheet">

<div class="container">
    <div style="width: 65%; display: flex;">
        <a class="menu-element" href="/">
            <h2>
                {{ env('APP_NAME') }}
            </h2>
        </a>

    </div>
    @foreach(config('menu')['header'] as $item)
        <h2>
            <a class="menu-element" href="{{ $item['href'] }}">
                {{ $item['title'] }}
            </a>
        </h2>
    @endforeach
    @if(\Illuminate\Support\Facades\Auth::check())
        <h2>
            <form action="{{ url('auth/logout') }}" method="post">
                <input type="submit" value="Logout" />
                @csrf
            </form>
        </h2>
    @else
        <div style="background: greenyellow; border-radius: 10px">
            <h2>
                <a class="menu-element login-button" href="/login">
                    Login
                </a>
            </h2>
        </div>
    @endif
</div>


