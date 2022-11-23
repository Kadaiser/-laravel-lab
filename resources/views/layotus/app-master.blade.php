<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalDomus</title>

    <link rel="stylesheet" type="" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="" href="{{url('assets/css/main-app.css')}}">
    <!-- import MDB -->
   <link rel="stylesheet" href="{{url('assets/css/mdb.dark.min.css')}}"/>
</head>

<body class="bg-transparent">
    @include('animation')
    @include('layotus.partials.navbar')
    <main>
        @yield('content')
    </main>

<script type="text/javascript" src="{{url('assets/js/chart.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/mdb.min.js')}}"></script>
</body>
</html>