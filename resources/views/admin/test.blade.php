<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .div_center>h2 {
            font-size: 40px;
            padding-bottom: 40px;
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


        <div class="main-panel">
            <div class="content-wrapper">
                
               <x-button />
               {{-- <x-form.input /> --}}
            </div>
        </div>



        {{-- ALL SCRIPT FILES --}}
        @include('admin.script')

        <!-- container-scroller -->
        <!-- plugins:js -->

        <!-- End custom js for this page -->

</body>

</html>