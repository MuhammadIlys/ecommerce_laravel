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
        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                <div class="alert alert-danger">
                    <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                @endif


                <div class="row mt-5">
                    <div class="col-md-12">
                       

                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Product data</h4>
                              </p>
                              <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Product title.</th>
                                      <th>Description</th>
                                      <th>Quantity</th>
                                      <th>Category</th>
                                      <th>Price</th>
                                      <th>Discount</th>
                                      <th>Image</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                      <td>{{$product->product_id}}</td>
                                      <td>{{$product->title}}</td>
                                      <td>{{$product->description}}</td>
                                      <td>{{$product->quantity}}</td>
                                      <td>{{$product->category}}</td>
                                      <td>{{$product->price}}</td>
                                      <td>{{$product->discount_price}}</td>
                                      <td><img src="/products/{{$product->image}}" alt=""></td>
                                      <td>
                                        <a class="badge badge-primary" href="{{url('edit_product',$product->product_id)}}" >Update</a>
                                        <a class="badge badge-danger" href="{{url('delete_product',$product->product_id)}}" onclick="return confirm('Do you want to delete the product?')">Delete</a>
                                    </td>
                                    </tr>
                                    @endforeach
                                   
                                    
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>


                    </div>
                </div>


            </div>
        </div>





        {{-- ALL SCRIPT FILES --}}
        @include('admin.script')

        <!-- container-scroller -->
        <!-- plugins:js -->

        <!-- End custom js for this page -->

</body>

</html>