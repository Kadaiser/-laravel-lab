<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edomus</title>
    <link rel="stylesheet" type="" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="" href="{{url('assets/css/main-app.css')}}">
</head>

<body>
    @include('animation')

    @include('layotus.partials.navbar')
    <main class="container container-transparent">
    @yield('content')
    </main>

<script type="text/javascript" src="{{url('assets/js/chart.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>