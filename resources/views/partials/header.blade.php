<link href="{{ URL::asset('css/header.css') }}" rel="stylesheet">

<div class="container-header">

        <a class="menu-element first" href="/">
            <h2>
                {{ env('APP_NAME') }}
            </h2>
        </a>
        @foreach(config('menu')['header'] as $item)
            <a class="menu-element" href="{{ $item['href'] }}">
                <h2>
                    {{ $item['title'] }}
                </h2>
            </a>
        @endforeach
        @if(\Illuminate\Support\Facades\Auth::check())
            <a href="/logout" class="menu-element login-button">
                <h2>
                    Logout
                </h2>
            </a>
        @else
            <a class="menu-element login-button" href="/auth">
                <h2>
                    Login
                </h2>
            </a>
        @endif
</div>

<style>
    .container-header {
        display: flex;
        justify-items: center;
        justify-content: space-between;
        gap: 15px;
        margin: auto;
        padding: 20px 0;
    }

    .menu-element {
        text-decoration: none;
        color: black;
        font-family: 'Nunito', sans-serif;
        font-size: 22px;
        float: right;
    }

    .menu-element.first {
        color: Red;
    }

    .login-button {
        background: greenyellow;
        border-radius: 10px;
        padding: 0 20px;
    }
</style>




