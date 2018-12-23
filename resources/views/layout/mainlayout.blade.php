<html lang="en">

<head>

    @include('layout.partials.head')

</head>

<body>

@include('layout.partials.nav')
<br>
<br>
@yield('content')

<script src={{asset("vendor/jquery/jquery.min.js")}}></script>
<script src={{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>

 </body>

</html>