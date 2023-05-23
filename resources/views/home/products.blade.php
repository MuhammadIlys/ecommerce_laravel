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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
   @include('sweetalert::alert');

   <div class="hero_area">
      <!-- header section strats -->
      @include('home.header')

      @if (session()->has('message'))
      <div class="alert alert-success">
          <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
          {{session()->get('message')}}
      </div>
          
      @endif


      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>

               <div class="mt-4">
                  <form action="{{url('product_search')}}" method="get">
                     @csrf
                     <div class="form-group">
                        <input type="text" class="form-control" name="textsearch" style="width: 400px">

                        <input type="submit" class="btn btn-primary" value="submit">


                     </div>
                  </form>
               </div>

            </div>
            <div class="row justify-content-center">

               @foreach ($products as $product)

               <div class="col-sm-6 col-md-3 col-lg-3 ">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$product->product_id)}}" class="option1">
                              Product details
                           </a>

                           <form action="{{url('add_cart',$product->product_id)}}" method="POST" class="form">
                              @csrf
                              <div class="row">

                                 <div class="col-md-4">
                                    <input type="number" class=" bg-light" name="quantity" value="1" min="1"
                                       style="width: 60px; height:50px; border-radius:0 30px 0 30px;border:1px solid red"
                                       max="{{$product->quantity}}">

                                 </div>

                                 <div class="col-md-4">
                                    <input type="submit" class="" value="Add to Cart"
                                       style="height: 50px; border-radius:30px 30px 0px 30px;border:1px solid red">
                                 </div>


                           </form>



                        </div>
                     </div>
                  </div>
                  <div class="img-box">
                     <img src="products/{{$product->image}}" alt="">
                  </div>
                  <div class="detail-box">
                     <h5>
                        {{$product->title}}
                     </h5>



                     @if ($product->discount_price != null)

                     <h6 style="color:red">
                        Discount Price <br>
                        ${{$product->discount_price}}
                     </h6>

                     <h6 style="text-decoration: line-through; color:blue">
                        Price <br>
                        ${{$product->price}}
                     </h6>
                     @else
                     <h6 style="color: blue">
                        Price <br>
                        ${{$product->price}}
                     </h6>

                     @endif

                  </div>
               </div>
            </div>

            @endforeach

            <span style="margin-top: 20px">
               {{-- {!!$products->withQueryString()->links('pagination::bootstrap-5')!!} --}}
               {!!$products->links('pagination::bootstrap-4')!!}
            </span>
         </div>


         <div class="btn-box">
            <a href="">
               View All products
            </a>
         </div>
   </div>
   </section>



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

   
   <!-- jQuery -->
   <script src="home/js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="home/js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="home/js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="home/js/custom.js"></script>
</body>

</html>