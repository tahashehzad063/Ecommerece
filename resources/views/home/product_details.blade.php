<base href="/public">
@include('main.header')


      <div class="col-sm-6 col-md-6 col-lg-5 m-auto  ">
         <div class="box">
         
            <div class="img-box">
               <img style="height:450px;width:450px " src="/product/{{$product->image}}" alt="">
            </div>
            {{-- <div class="detail-box col-6 m-auto"> --}}
                <h1>Product Details:</h1>
               <h2 class="">
                  {{$product->title}}
               </h2>
               @if($product->discount_price!=null)
               <h1>Discount Price:</h1>
               <h6 style="color: red">
               For You ${{$product->discount_price}}
             </h6>
             <h6 style="color:blue; text-decoration: line-through;">
                ${{$product->price}}
             </h6>
             @else
             <h3>Price:</h3>
             <h6 style="color:blue; ">
                ${{$product->price}}
             </h6>
             @endif
             <h2>Category:</h2>
             <h6>   {{$product->category}}</h6>
             <h2>Description:</h2>
             <h6>   {{$product->description}}</h6>
             <h2>Quantity:</h2>
             <h6>   {{$product->quantity}}</h6>
             <form action="{{url('size',$product->id)}}">

                <div class="col-md-6">
                   <div class="mb-3">
                  
                     </form>
               </div>
           </div>
             <form action="{{url('add_cart',$product->id)}}" method="POST" >
               @csrf
               <div class="row">
<div class="col-md-4">
   <label class="fw-bold" for="email">Size</label>
   <select name="type" id="type" >
      <option value="0">Small</option>
      <option value="1">Medium</option>
      <option value="2">Large</option>
     </select>
<input class="w-100" type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}">
</div>
<div class="col-md-4">

<input type="submit"  value="Add to Cart">
</div>
               </div>
            </form>
            {{-- </div> --}}
         </div>

   
   </div>
@include('main.subscribe')
<!-- footer start -->
@include('main.footer')
<!-- footer end -->
@include('main/tagsjs')