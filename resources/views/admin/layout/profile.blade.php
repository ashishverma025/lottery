
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="route" content="{{ url('/') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//db.onlinewebfonts.com/c/ccafc14f60f43b7cc1e02a9652aea2b2?family=Faricy+New" rel="stylesheet" type="text/css"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/admn/css/profile_bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/admn/css/profile_style.css') }}">
    </head>
    <body>
        @yield('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Script  -->
        <script src="{{ asset('public/admn/js/profile-bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/admn/js/common.js') }}"></script>
    </body>
</html>