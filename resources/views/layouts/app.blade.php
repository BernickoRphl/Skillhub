<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'SKILLHUB' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Page Content --}}
    <main class="pt-16">
        @yield('content')
    </main>

</body>
</html>
