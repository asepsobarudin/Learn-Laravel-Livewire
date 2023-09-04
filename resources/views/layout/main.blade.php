<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Todo List</title>

    {{--  Link Tailwind Css  --}}
    @vite('resources/css/app.css')

    {{--  Script Ionicons  --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>

    @include('components.navbar.index')
    <div class="flex justify-center items-center">
        @yield('content')
    </div>

</body>

</html>
