<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Global CSS -->
    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: "Poppins", sans-serif;
            background: #f0f2f5;
        }
    </style>

    @yield('css')
</head>

<body>

    @yield('content')

</body>
</html>