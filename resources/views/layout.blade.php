<!DOCTYPE html>
<html lang="en">

@include('fixed.head')

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
         <div class="spinner">
              <span class="spinner-rotate"></span>
         </div>
    </section>

@include('fixed.nav')

@yield('content')

@include('fixed.footer')

@include('fixed.scripts')

</body>
</html>

