@include('main.header')
<style>
     <style>
        label {
            display: block;
        }

        .item {
            display: none;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .filter {
            color: red;
            text-align: center;
            padding-top: 10px;
            display: none;
        }
    </style>
{{-- </style> --}}
<section class="product_section layout_padding">
  <div class="container">
     <div class="heading_container heading_center">
        <h2>
           Our <span>All Products</span>
        </h2>
     </div>
   <div class="col-6 m-auto">

      <label>
         <input type="checkbox" id="filter1" onchange="updateVisibility()"> Mens Shirt
      </label>
      <label>
         <input type="checkbox" id="filter2" onchange="updateVisibility()"> Women Dress
      </label>
      <label>
         <input type="checkbox" id="filter3" onchange="updateVisibility()"> Shoes
      </label>
      <label>
         <input type="checkbox" id="filter4" onchange="updateVisibility()"> Bags
      </label>
   </div>

    
  
 
     <h1 class="text-center pt-3" style="color: red">Mens Shirt</h1>
     <div class="row item" data-filters="filter1">
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
     <div class="row item " data-filters="filter2">
      @foreach($women as $product)
        <div class="col-sm-6 col-md-4 col-lg-4 mb-3">
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
  
     <h1 class="text-center pt-3" style="color: red"> Shoes</h1>
     <div class="row item filter3" data-filters="filter3" id="#shoes">
      @foreach($shoes as $product)
        <div class="col-sm-6 col-md-4 col-lg-4 mb-3">
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

         {{ $shoes->links() }}
       </div>
     </div>
     <h1 class="text-center pt-3" style="color: red"> Bags</h1>
     <div class="row item " data-filters="filter4" id="#bags">
      @foreach($bags as $product)
        <div class="col-sm-6 col-md-4 col-lg-4 mb-3">
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

         {{ $bags->links() }}
       </div>
     </div>
  
 
  </div>
</section>

      </div>


 @include('main.subscribe')

     <!-- footer start -->
     @include('main.footer')
     <!-- footer end -->
     <script>
      // Function to update the visibility of items based on selected filters
      function updateVisibility() {
          // Get selected filters
          const selectedFilters = Array.from(document.querySelectorAll('input[type=checkbox]:checked')).map(checkbox => checkbox.id);

          // Iterate through items and show/hide based on filters
          const items = document.querySelectorAll('.item');
          items.forEach(item => {
              const filters = item.getAttribute('data-filters').split(' ');
              const isVisible = filters.every(filter => selectedFilters.includes(filter));
              item.style.display = isVisible ? 'block' : 'none';
          });

          // Show/hide filter divs
          const filterDivs = document.querySelectorAll('.filter');
          filterDivs.forEach(div => {
              const filterId = div.id.replace('Div', '');
              div.style.display = selectedFilters.includes(filterId) ? 'block' : 'none';
          });
      }

      // Attach event listeners to checkboxes
      const checkboxes = document.querySelectorAll('input[type=checkbox]');
      checkboxes.forEach(checkbox => {
          checkbox.addEventListener('change', updateVisibility);
      });
  </script>
   @include('main/tagsjs')