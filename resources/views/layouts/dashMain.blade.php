<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes/dashIncludes.head')
</head>

<body>

    @yield('header')
    @yield('login')
    @yield('register')
    @yield('footer')
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @include('includes/dashIncludes.footerJs')
</body>

</html>