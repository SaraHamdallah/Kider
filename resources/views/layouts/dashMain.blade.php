<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('includes/dashIncludes.head')

<body>

    @yield('header')
    @yield('content')
    @yield('footer')
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @include('includes/dashIncludes.footerJs')
</body>

</html>