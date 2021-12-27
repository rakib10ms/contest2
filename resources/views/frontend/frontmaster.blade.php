<!DOCTYPE html>
<html lang="en">

<head>

<tittle> @yield('title') </tittle>
</head>

<body>

<style>
  a, a:hover, a:active, a:visited, a:focus {
    text-decoration:none!important;
}
  </style>
@include('frontend.inc.header')




@include('frontend.inc.navbar')

@yield('content')

@include('frontend.inc.footer')


    

 </body>
</html>