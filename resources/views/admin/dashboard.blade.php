<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin KSPM</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div style="padding: 40px;">

        <h1>Dashboard Admin KSPM</h1>

        <p>
            Selamat datang,
            <strong>{{ Auth::user()->name }}</strong>
        </p>

        <p>
            Anda berhasil login sebagai Admin KSPM.
        </p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit">
                Logout
            </button>
        </form>

    </div>

</body>
</html>