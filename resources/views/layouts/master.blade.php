<!DOCTYPE html>
<html lang="sk">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>

        <meta name="author" content="Damián Hrubják" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&family=Poppins:wght@400;700&display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css')}}" />

    </head>

    <main>
        @include('includes.menu')
        @yield('content')
        @include('includes.footer')
    </main>

    <div class="js-scripts">
        <script defer src="{{ mix('js/app.js') }}"></script>
    </div>
    </body>

</html>