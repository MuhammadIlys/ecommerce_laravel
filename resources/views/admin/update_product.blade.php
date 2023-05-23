<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    
    @include('admin.css')

    <style>
        /* input{
            background-color: white;
            color: #191C24;
        }
        input:focus{
            background-color: #191C24 !important;
            color: white !important;
        } */
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

                {{-- @if (session()->has('message'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                @endif --}}

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title text-center">UPDATE PRODUCT</h2>

                                <form class="forms-sample form " action="{{url('update_product',$product->product_id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" class="form-control p-input" id="product_name"
                                            value="{{$product->title}}" name="product_name" 
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_description">Product description</label>
                                        <input type="text" class="form-control p-input" id="product_description"
                                            value="{{$product->description}}" name="product_description" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_price">product_price</label>
                                        <input type="number" class="form-control p-input" id="product_price"
                                            value="{{$product->price}}" name="product_price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Discounted Price</label>
                                        <input type="number" class="form-control  p-input"
                                            value="{{$product->discount_price}}" name="product_discount" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Product quantity</label>
                                        <input type="number" class="form-control p-input "
                                            value="{{$product->quantity}}" name="product_quantity" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Product category</label>
                                        <select name="product_category" id="" class="form-control p-input " required
                                            style="color:white">
                                            <option class="p-input" style="color:black"
                                                value="{{$product->category}}">{{$product->category}}
                                            </option>
                                            @foreach ($categories as $category)
                                            <option class="p-input" style="color:white"
                                                value="{{$category->category_name}}">{{$category->category_name}}
                                            </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Change Product Image</label>
                                            <input type="file" class="form-control " name="product_image" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Previous Image</label>
                                            <img src="/products/{{$product->image}}" alt="" width="150px" height="150px">
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary btn-block mr-2">Submit</button>

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
                    // function myFunction(){
        //     // alert('Hello');
        //     // $(".p-input").css("backgroundColor", "white");
        //     // $(".p-input").css("color", "black");
        // }
        $(".p-input").css("backgroundColor", "white");
        $(".p-input").css("color", "black");
                </script>
</body>

</html>