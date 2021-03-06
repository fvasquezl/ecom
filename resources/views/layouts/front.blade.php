<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Tienda Virtual</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/bootstrap/css/album.css')}}" rel="stylesheet">
</head>

<body>

@include('layouts.partials.navigator')
@yield('content')

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="index.html#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="https://getbootstrap.com/docs/4.1/">Visit the homepage</a> or read our <a href="https://getbootstrap.com/docs/4.1/getting-started/">getting started guide</a>.</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="{{asset('assets/bootstrap/assets/js/vendor/jquery-slim.min.js')}}"><\/script>')</script>
<script src="{{asset('assets/bootstrap/assets/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/assets/js/vendor/holder.min.js')}}"></script>
</body>
</html>
