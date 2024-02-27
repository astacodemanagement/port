<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="{{ asset('upload/favicon.png') }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Mukta:wght@800&family=Poppins:wght@400;500;600;700&family=Roboto&family=Ubuntu&display=swap" />

    <!-- All CSS -->
    @include('frontend.layouts.styles')

    <!-- All Javascripts -->
    @include('frontend.layouts.script')

</head>

<body>
    @include('frontend.components.display_toast')

    {{-- Navbar --}}
    @include('frontend.layouts.navbar')

    @yield('frontend-content')

    {{-- Footer --}}
    @include('frontend.layouts.footer')

    {{-- Footer bottom --}}
    @include('frontend.layouts.footer_bottom')

    @include('frontend.layouts.script_footer')

</body>

</html>
