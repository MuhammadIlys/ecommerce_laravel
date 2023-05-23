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
        h1{
            font-size:23px !important;
        }
        th{
            padding: 15px !important;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->


         {{-- <div class="container mt-5 p-5" style="border: 1px solid pink; border-radius:5px">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center ">
                    <img src="{{url('home/images/client.jpg')}}" style="height: 60px; border-radius:50px;" alt="" class="mr-3">
                    <h1>Order ID</h1>
                    <h1 class="ml-5">Black Dress</h1>
                    <h1 class="ml-5">23 dec 2022</h1>
                    
                  
                </div>
                <div class="col-md-4">
                    <div class="ml-5 text-right">
                        <h1 class="">$20</h1>
                        <span style="color:rgb(117, 120, 121)">Qty : 1</span>
                    </div>
                </div>
            </div>
         </div> --}}


         <div class="container mt-5 p-5" style="border: 1px solid pink; border-radius:5px">
            <div class="row">
                <div class="col-md-12 ">
                    <table class="table table-striped border border-rounded table-hover">
                        <thead>
                          <tr>
                            <th scope="col ">Product Image</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Delivery Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order)
                          <tr>
                            <th scope="row"><img src="products/{{$order->image}}" style="height: 60px; width:60px; border-radius:50px; border:1px solid #FF424D" alt="" class="mr-3 align-middle p-1"></th>
                            <td class="align-middle">{{$order->id}}</td>
                            <td class="align-middle">{{$order->product_title}}</td>
                            <td class="align-middle">{{$order->quantity}}</td>
                            <td class="align-middle">{{$order->price}}</td>
                            <td class="align-middle">{{$order->payment_status}}</td>
                            <td class="align-middle">{{$order->delivery_status}}</td>
                            <td class="align-middle">
                                @if ($order->delivery_status == 'Delivered')
                                    
                                @elseif ($order->delivery_status == 'Cancelled')
                                <a href="{{url('delete_order',$order->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the order?')">Delete order</a>

                                @else

                                <a href="{{url('cancel_order',$order->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel the order?')">Cancel order</a>
                                @endif
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
         </div>


      </div>
      
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