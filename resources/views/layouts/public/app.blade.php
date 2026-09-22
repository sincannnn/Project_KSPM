<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'KSPM STMIK Adhi Guna')
    </title>


    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


    {{-- BOOTSTRAP ICONS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">


    {{-- Sedikit style global --}}
    <style>
    body {
        font-family: "Poppins", sans-serif;
    }
    </style>


    @stack('styles')

</head>


<body>


    {{-- NAVBAR --}}
    @include('layouts.public.partials.navbar')


    {{-- CONTENT --}}
    <main>

        @yield('content')

    </main>


    {{-- FOOTER --}}
    @include('layouts.public.partials.footer')


    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>


    @stack('scripts')

</body>

</html>