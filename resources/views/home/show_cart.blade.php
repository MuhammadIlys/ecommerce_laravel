<!DOCTYPE html>
<html>
   <head>
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

      <style>
       
      </style>

   </head>
   <body>
   @include('sweetalert::alert');

      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')

         <div class="container">
          <h1 class="text-center mt-2" style="font-size: 60px; color:#FF424D ">Cart</h1>
         </div>
        

         @if (session()->has('message'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                    
                @endif



         <div class="container  mb-5">
          <div class="row d-flex justify-content-center mt-5">

            <table class="table table-hover table-dark">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total Price</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $total_price=0 ?>
                @foreach ($cart as $item)
 
                <tr>
                  <th style="vertical-align: middle" scope="row">{{$item->id}}</th>
                  <td style="vertical-align: middle"> {{$item->product_title}}</td>
                  <td style="vertical-align: middle">{{$item->quantity}}</td>
                  <td style="vertical-align: middle">${{$item->price}}</td>

                  <td class="v-align"><img src="/productS/{{$item->image}}" alt="" style="width: 70px; height:70px; border-radius:50%"></td>

                  <td style="vertical-align: middle"><a href="{{url('remove_cart',$item->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a></td>
                </tr>
                <?php  $total_price = $total_price + $item->price ?>

                @endforeach
              </tbody>
            </table>

            
            <div class="col-md-4 bg-dark p-3"> 
              <h1 class=" text-light text-center" style="font-size: 25px"> Total price :  ${{$total_price}} </h1>
              <a href="{{url('cash_order')}}" class="btn btn-primary btn-block mt-3">Cash on delivery</a>
              <a href="{{url('stripe',$total_price)}}" class="btn btn-primary btn-block mt-3">Online payment</a>
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

      <script>
        function confirmation(ev){
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);
          swal({
            title: "Are your sure you want to delete this product?",
            text: "you will not be able to revert this",
            icon:'warning',
            buttons: true,
            dangerMode: true,
          })
          .then((willCancel) => {
            if(willCancel){
              window.location.href = urlToRedirect;
            }
          })
        }
      </script>
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