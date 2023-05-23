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
                
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                    
                @endif
              
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                              <h2 class="card-title text-center">ADD PRODUCT</h2>
                              
                              <form class="forms-sample form " action="{{url('add_product')}}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="product_name">Product Name</label>
                                  <input type="text" class="form-control p-input" id="product_name" placeholder="Product name" name="product_name" onfocusout="myFunction()" required>
                                </div>
                                <div class="form-group">
                                  <label for="product_description">Product description</label>
                                  <input type="text" class="form-control p-input" id="product_description" placeholder="product_description" name="product_description" required>
                                </div>
                                <div class="form-group">
                                  <label for="product_price">product_price</label>
                                  <input type="number" class="form-control p-input" id="product_price" placeholder="product_price" name="product_price" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Discounted Price</label>
                                    <input type="number" class="form-control  p-input" placeholder="Enter Your discount price" name="product_discount" >
                                </div>
                                <div class="form-group">
                                    <label for="">Product quantity</label>
                                <input type="number" class="form-control p-input " placeholder="Enter Your Product Quantity" name="product_quantity" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Product category</label>
                                <select name="product_category" id="" class="form-control p-input " required>
                                    @foreach ($categories as $category) 
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                    @endforeach
                                
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                <input type="file" class="form-control " placeholder="Enter Your Product image" name="product_image" required>
                                </div>
                                
                                
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                
                              </form>
                            </div>
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