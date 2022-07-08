<!DOCTYPE html>
<html lang="en">
  <head>
    <!--head -->
     @include('backend.includes.head')
   <!-- css file -->
   @include('backend.includes.css')
  </head>

  <body>

    <!-- side bar -->

    @include('backend.includes.sidebar')

   <!-- top bar -->
   @include('backend.includes.topbar')

   <!-- right bar -->
   @include('backend.includes.rightbar')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
     
        @yield('content')

     <!-- footer -->
     @include('backend.includes.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

   <!-- Scripts -->
   @include('backend.includes.scripts')
  </body>
</html>