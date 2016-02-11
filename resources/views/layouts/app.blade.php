<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Concert Guitar Tabs</title>

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Concert Guitar Tabs</a>
                </div>
                <div class="nav">
                    <ul class="nav nav-pills">
                        <li id="homeTab" role="presentation"><a href="/">Home</a></li>
                        <li id="addMusicTab" role="presentation"><a href="/addmusic">Add Music (Admin Only)</a></li>
                        <li id="aboutTab" role="presentation"><a href="/about">About</a></li>
                    </ul>
                </div>
            </nav>
            @yield('content')
    </body>
</html>