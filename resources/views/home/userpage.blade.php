<!DOCTYPE html>
<html>

<head>
   <!-- Basic -->
   <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="">
    <title>Laravel Ecommerce</title>
    <!-- bootstrap core css -->
    
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />

    <style>
      /* .navbar-expand-lg .navbar-nav{
         align-items: center !important;
      } */
    </style>
</head>

<body>
   @include('sweetalert::alert');
   <div class="hero_area">
      <!-- header section strats -->
      @include('home.header')

      
   {{-- @if (session()->has('message'))
   <div class="alert alert-success">
       <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
       {{session()->get('message')}}
   </div>
       
   @endif --}}
      <!-- end header section -->
      <!-- slider section -->
      @include('home.slider')
      <!-- end slider section -->
   </div>
   <!-- why section -->
   @include('home.why')

   <!-- end why section -->

   <!-- arrival section -->
   @include('home.arival')

   <!-- end arrival section -->

   <!-- product section -->
   @include('home.product')

   {{-- <div class="container mb-5">
      <div class="row">
         <div class="col-md-10 p-3 bg-dark offset-1">


            <h3 class="text-light mt-2 mb-2">All Comments</h3>
            <div>

               <div class="d-flex align-items-center mt-4">
                  <img src="home/images/client.jpg"
                     style="height: 50px; width:50px; border-radius:50px; border:1px solid #FF424D;margin-bottom:auto" alt=""
                     class="mr-3 align-middle p-1">
                  <div>
                     <p class="text-light">Muhammad Khan</p>
                     <span style="font-size: 15px" class="text-light">This is first commentThis is first commentThis is first commentThis is first comment</span>
                     <p><a style="font-size: 15px;cursor:pointer" href="javascript::void(0)" class="text-primary text-right" onclick="reply(this)">Reply</a></p>

                     <div class=" reply" style="display: none">
                        <textarea name="reply" id="reply" class="mr-2" cols="50" rows="1" placeholder="Reply..." style="border-radius:10px;"></textarea>

                        <a href="" style="border-radius:5px;" class="btn btn-success" >Reply</a>
                     </div>
                     

                  </div>
               </div>

               <div class="d-flex align-items-center mt-4">
                  <img src="home/images/client.jpg"
                     style="height: 50px; width:50px; border-radius:50px; border:1px solid #FF424D;margin-bottom:auto" alt=""
                     class="mr-3 align-middle p-1">
                  <div>
                     <p class="text-light">Muhammad Khan</p>
                     <span style="font-size: 15px" class="text-light">This is first commentThis is first commentThis is first commentThis is first comment</span>
                     <p><a style="font-size: 15px;cursor:pointer" href="javascript::void(0)" class="text-primary text-right" onclick="reply(this)">Reply</a></p>

                     <div class="reply" style="display: none">
                        <textarea name="reply" id="reply" class="mr-2" cols="50" rows="1" placeholder="Reply..." style="border-radius:10px;"></textarea>

                        <a href="" style="border-radius:5px;" class="btn btn-success" >Reply</a>
                     </div>
                     

                  </div>
               </div>

              
            </div>

            <div>

            </div>

         </div>
      </div>
   </div> --}}

   <!-- end product section -->

   <!-- subscribe section -->
   @include('home.subscribe')
   <!-- end subscribe section -->
   <!-- client section -->
   @include('home.client')

   <!-- end client section -->
   <!-- footer start -->
   @include('home.footer')

   <!-- footer end -->
   <div class="cpy_">
      <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

         Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

      </p>
   </div>

   <!-- jQery -->
   <script src="home/js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="home/js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="home/js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="home/js/custom.js"></script>
</body>

</html>