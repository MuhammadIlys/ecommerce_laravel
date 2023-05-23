<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->

        {{-- BODY FILE --}}
      @include('admin.body')
    
      



      {{-- ALL SCRIPT FILES --}}
      @include('admin.script')

    <!-- container-scroller -->
    <!-- plugins:js -->
    
    <!-- End custom js for this page -->

  </body>
</html>