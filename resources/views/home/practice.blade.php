<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    
    <style>
        input{
            background-color: white;
            color: #191C24;
        }
        input:focus{
            background-color: #191C24 !important;
            color: white !important;
        }
        
        
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->

        {{-- BODY FILE --}}
     
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="jumbotron mt-5">
                    <h1 class="text-center text-dark">{{$data}}</h1>
                </div>

                    </div>
                </div>

    
      



      {{-- ALL SCRIPT FILES --}}
      @include('admin.script')

    <!-- container-scroller -->
    <!-- plugins:js -->
    
    <!-- End custom js for this page -->

    <script>
        function myFunction(){
            // alert('Hello');
            $(".p-input").css("backgroundColor", "white");
            $(".p-input").css("color", "black");
        }
    </script>
  </body>
</html>