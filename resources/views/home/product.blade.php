<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>

         <div class="mt-4">
            <form action="{{url('product_searchh')}}" method="get">
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

         <div class="col-sm-6 col-md-4 col-lg-4 ">
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
                                 style="width: 80px; height:50px" max="{{$product->quantity}}">
                                
                           </div>

                           <div class="col-md-4">
                              <input type="submit" class="" value="Add to Cart" style="height: 50px;">
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