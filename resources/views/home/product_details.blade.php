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
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->


        <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-4 text-center p-3">
                    <img src="/products/{{$product->image}}" alt="" style="width: 250px">
                </div>
                <div class="col-md-6 p-3">
                    <h2 class="text-uppercase text-danger">{{$product->title}}</h2>

                    @if($product->discount_price != null)
                    <h6 class="text-danger " style="text-decoration: line-through;"> Price : <span class="text-primary">${{$product->price}}</span></h6>
                   <h6 class="text-danger"> Discount Price : <span class="text-primary">${{$product->discount_price}}</span></h6>
                    @else
                    <h6 class="text-danger"> Price : <span class="text-primary">${{$product->price}}</span></h6>
                    @endif
                    
                    <h6 class="text-danger"> Category : <span class="text-primary">{{$product->category}}</span></h6>
                    <h6 class="text-danger"> Details :</h6>
                    <p>{{$product->description}}</p>
                    <h6 class="text-danger"> Quantity : <span class="text-primary">{{$product->quantity}}</span></h6>


                    <form action="{{url('add_cart',$product->product_id)}}" method="POST" class="form mt-3">
                        @csrf
                        <div class="row">

                           <div class="col-md-4">
                              <input type="number" class=" bg-light" name="quantity" value="1" min="1"
                                 style="width: 80px; height:50px" max="{{$product->quantity}}">
                                
                           </div>

                           <div class="col-md-4">
                              <input type="submit" class="" value="Add to Cart" style="height: 50px;">
                           </div>

                           {{-- <button type="submit" class="btn btn-primary btn-block">Add to Cart</button> --}}
                     </form>

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