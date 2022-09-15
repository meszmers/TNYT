<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel :)</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <!-- Scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <style>
        /* Box sizing rules */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif;
        }

        /* Remove default margin */
        body,
        h1,
        h2,
        h3,
        h4,
        p,
        figure,
        blockquote,
        dl,
        dd {
            margin: 0;
        }

        /* Remove list styles on ul, ol elements with a list role, which suggests default styling will be removed */
        ul[role='list'],
        ol[role='list'] {
            list-style: none;
        }

        /* Set core root defaults */
        html:focus-within {
            scroll-behavior: smooth;
        }

        /* Set core body defaults */
        body {
            min-height: 100vh;
            text-rendering: optimizeSpeed;
            line-height: 1.5;
        }

        /* A elements that don't have a class get default styles */
        a:not([class]) {
            text-decoration-skip-ink: auto;
        }

        /* Make images easier to work with */
        img,
        picture {
            max-width: 100%;
            display: block;
        }

        /* Inherit fonts for inputs and buttons */
        input,
        button,
        textarea,
        select {
            font: inherit;
        }

        /* Remove all animations, transitions and smooth scroll for people that prefer not to see them */
        @media (prefers-reduced-motion: reduce) {
            html:focus-within {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

    </style>
</head>
<body class="antialiased" style="width: 1100px; margin: auto">
@yield('body')
</body>
</html>
