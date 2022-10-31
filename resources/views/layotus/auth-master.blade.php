<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edomus</title>
    <link rel="stylesheet" type="" href="{{url('assets/css/bootstrap.min.css')}}">
</head>


<style>
    html{
        background-color: #111;
    }
    body, .container-transparent{
        background-color: transparent !important;
    }
    .body{
        margin : 0;
        padding: 0;
        font-family: sans-serif;
    }
    a{
        text-decoration: none;
    }
    p, h1, h2, h3, h4, h5, h6{
        color: green;
    }
    /* Modify the background color */
         
    .container, .container-fluid{
        background-color: #222;
    }
    .navbar-custom {
        background-color: #222;
    }
    /* Modify brand and text color */

    .form-control{
        background-color: #424242;
        color: lightgreen;
        border-color: lightgreen;
    }
    input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: darkgreen;
        opacity: .7; /* Firefox */
    }
    input::-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: darkgreen;
    }
        
    .navbar-custom .navbar-brand,
    .navbar-custom .navbar-text {
        color: lightgreen;
    }
    /* Modify brand and text color */
    .navbar-custom .navbar-brand,
    .navbar-nav, .nav-link,
    .navbar-custom .navbar-text {
        color: green;
    }
    .navbar-nav .nav-link.active, .navbar-nav .show>.nav-link{
        color: lightgreen;
    }
    .nav-link.disabled, label{
        color: darkgreen;
    }
    .nav-link:focus, .nav-link:hover{
        color: lightgreen;
    }
</style>

<body>
    @include('animation')

    @include('layotus.partials.public-navbar')
    <main class="container container-transparent">
    @yield('content')
    </main>
    
<script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>