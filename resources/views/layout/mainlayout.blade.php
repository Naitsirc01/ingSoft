<html lang="en">

<head>

 @include('layout.form.head')
 @include('layout.form.style')

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