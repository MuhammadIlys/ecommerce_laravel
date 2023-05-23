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
                
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
                    
                @endif
                <div class="div_center">
                    <h2 class="text-center pt-5">Add Category</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">


                        <form action="{{url('add_category')}}" method="POST" class="form col-md-6 offset-3">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control bg-light text-center" placeholder="Enter Your Category" name="category_name">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>


                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="div_center">
                            <h2 class="text-center pt-5">All Categories</h2>
                        </div>

                        <table class="table table-hover table-dark col-md-8 offset-2">
                            <thead >
                              <tr >
                                <th scope="col" class="text-light">ID</th>
                                <th scope="col" class="text-light">Category Name</th>
                                <th scope="col" class="text-light">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $category)
                              <tr class="text-light">
                                    
                               
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->category_name}}</td>
                                <td>
                                    <a onclick="return confirm('Are you sure you want to delete this category?')" href="{{url('delete_category',$category->id)}}" class="btn btn-danger mr-2">Delete</a>
                                    <a href="{{url('update_category',$category->id)}}" class="btn btn-primary">Update</a>
                                </td>
                              </tr>
                              @endforeach
                              
                            </tbody>
                          </table>
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