<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <title>Fruitables - Vegetable Website Template</title> --}}
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('user.layout.layouts-style')

    @yield('title')
</head>


<body>

    @include('user.layout.navbar')


    @yield('content')

    @include('user.layout.layouts-script');
</body>

</html>
