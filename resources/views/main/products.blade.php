    {{-- Our products --}}
      <!-- product section -->
      <section class="product_section layout_padding" id="product">
        <div class="container">
           <div class="heading_container heading_center">
              <h2>
                 Our <span>products</span>
              </h2>
           </div>
           {{-- @extends('home.rem_product')
           @section('content') --}}
           <h1 class="text-center pt-3" style="color: red">Mens Shirt</h1>
           <div class="row" id="men">
            @foreach($product as $pro)
              <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
                 <div class="box">
                    <div class="option_container">
                       <div class="options">
                        <form action="{{ url('add_wishlist', $pro->id) }}" method="POST">
                           @csrf
                           <button type="submit" style="background-color: transparent; border: none;">
                               <div class="rounded-circle bg-danger" style="width: 50px; height: 50px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                   <i class="fa-solid fa-heart" style="color: white; font-size: 30px;"></i>
                               </div>
                           </button>
                       </form>
                          <a href="{{url('product_details',$pro->id)}}" class="option1">
                           Product Details
                          </a>
                          <form action="{{url('add_cart',$pro->id)}}" method="POST" >
                           @csrf
                           <div class="row">
<div class="col-md-4">

   <input class="w-100" type="number" name="quantity" value="1" min="1">
</div>
<div class="col-md-4">

   <input type="submit"  value="Add to Cart">
</div>
                           </div>
                        </form>
                       </div>
                    </div>
                    <div class="img-box">
                       <img src="/product/{{$pro->image}}" alt="">
                    </div>
                    <div class="detail-box">
                       <h5>
                          {{$pro->title}}
                       </h5>
                       @if($pro->discount_price!=null)
                       <h6 style="color: red">
                       For You ${{$pro->discount_price}}
                     </h6>
                     <h6 style="color:blue; text-decoration: line-through;">
                        ${{$pro->price}}
                     </h6>
                     @else
                     <h6 style="color:blue; ">
                        ${{$pro->price}}
                     </h6>
                     @endif
                     
                    </div>
                 </div>
              </div>
              @endforeach
              <div class="col-1  m-auto">

                 {{ $product->links() }}
               </div>
           </div>
           <h1 class="text-center pt-3" style="color: red">Women Dress</h1>
           <div class="row" id="women">
            @foreach($women as $product)
              <div class="col-sm-6 col-md-4 col-lg-4 mb-3">
                 <div class="box">
                    <div class="option_container">
                       
                       
                       <div class="options">
                        <form action="{{ url('add_wishlist', $product->id) }}" method="POST">
                           @csrf
                           <button type="submit" style="background-color: transparent; border: none;">
                               <div class="rounded-circle bg-danger" style="width: 50px; height: 50px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                   <i class="fa-solid fa-heart" style="color: white; font-size: 30px;"></i>
                               </div>
                           </button>
                       </form>
                       
                          <a href="{{url('product_details',$product->id)}}" class="option1">
                           Product Details
                        </a>
                        <form action="{{url('add_cart',$product->id)}}" method="POST" >
                           @csrf
                           <div class="row">
<div class="col-md-4">

   <input class="w-100" type="number" name="quantity" value="1" min="1">
</div>
<div class="col-md-4">

   <input type="submit"  value="Add to Cart">
</div>
                           </div>

                        </form>
                       </div>
                    </div>
                    <div class="img-box">
                       <img src="/product/{{$product->image}}" alt="">
                    </div>
                    <div class="detail-box">
                       <h5>
                          {{$product->title}}
                       </h5>
                       @if($product->discount_price!=null)
                       <h6 style="color: red">
                       For You ${{$product->discount_price}}
                     </h6>
                     <h6 style="color:blue; text-decoration: line-through;">
                        ${{$product->price}}
                     </h6>
                     @else
                     <h6 style="color:blue; ">
                        ${{$product->price}}
                     </h6>
                     @endif
                     
                    </div>
                 </div>
              </div>
              @endforeach
              <div class="col-1  m-auto">

               {{ $women->links() }}
             </div>
           </div>
           {{-- @endsection --}}
           <div class="btn-box">
              <a href="{{url('rem_product')}}">
              View All products
              </a>
           </div>
        </div>
     </section>
     <!-- end product section -->