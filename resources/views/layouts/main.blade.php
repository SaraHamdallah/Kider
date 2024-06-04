<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        @include('includes.spinner')
        <!-- Spinner End -->


        <!-- Navbar Start -->
        @include('includes.nav')
        <!-- Navbar End -->
@yield('header')
@yield('404')
        <!-- Footer Start -->
        @include('includes.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('includes.footerJs')
</body>

</html>