<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon blog</title>
    <link rel="stylesheet" href="/appStyle.css">
    <script src="/appScript.js"></script>
</head>
<body>

    {{-- <header>
        {{$slot}}
    </header> --}}

    @yield('content')

</body>
</html>
