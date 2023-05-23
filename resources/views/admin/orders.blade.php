<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
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

                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                @endif


                <div class="row mt-5">
                    <div class="col-md-12">
                       

                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Product data</h4>
                              <form action="{{url('search')}}" method="get">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control p-input" placeholder="Search " name="search">
                                    <div class="input-group-append">
                                      <input type="submit" class="input-group-text" id="basic-addon2" value="Submit">
                                    </div>
                                  </div>
                                  
                              </form>
                              </p>
                              <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Customer name</th>
                                      <th>Customer email</th>
                                      <th>Phone</th>
                                      <th>Address</th>
                                      <th>Product title</th>
                                      <th>Quantity</th>
                                      <th>Price</th>
                                      <th>Payment status</th>
                                      <th>Delivery status</th>
                                      <th>Image</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @forelse($orders as $order)
                                    <tr>
                                      <td>{{$order->id}}</td>
                                      <td>{{$order->name}}</td>
                                      <td>{{$order->email}}</td>
                                      <td>{{$order->phone}}</td>
                                      <td>{{$order->address}}</td>
                                      <td>{{$order->product_title}}</td>
                                      <td>{{$order->quantity}}</td>
                                      <td>{{$order->price}}</td>
                                      <td>{{$order->payment_status}}</td>
                                      <td>{{$order->delivery_status}}</td>
                                      <td><img src="/products/{{$order->image}}" alt=""></td>
                                      <td>
                                        @if ($order->delivery_status == 'processing')
                                            
                                        <a class="badge badge-primary" href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered?')" >Delivered</a>
                                        @else
                                        <p>Delivered</p>
                                        @endif
                                        <a class="badge badge-danger" href="{{url('print_pdf',$order->product_id)}}">Print PDF</a>
                                    </td>
                                    </tr>

                                    @empty
                                    <tr>
                                        <td> No data found</td>
                                    </tr>

                                    @endforelse
                                   
                                    
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>


                    </div>
                </div>


            </div>
        </div>


        <script>
            function myFunction(){
    
                $(".p-input").css("backgroundColor", "white");
              
            }
        </script>


        {{-- ALL SCRIPT FILES --}}
        @include('admin.script')

        <!-- container-scroller -->
        <!-- plugins:js -->

        <!-- End custom js for this page -->

</body>

</html>