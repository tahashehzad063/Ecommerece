
<base href="/public">
@include('adminmain.csstags')
  </head>
  <style>
    label{

        display: inline-block;
        width: 250px;
    }
  </style>
  <body>
    <div class="container-scroller">
  @include('adminmain.sidebar')
      <div class="container-fluid page-body-wrapper">
     @include('adminmain.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
         @include('adminmain.upgrade')
         {{-- Price --}}
      <h1 class="text-center">Add Products</h1>
      @if(session()->has('message'))
      <div class="alert alert-success">
         {{session()->get('message')}}
      </div>
      @endif
      <div class="col-8 m-auto">
<form action="{{URL('update_product',$product->id)}}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="col-12 m-auto">
    
              <label for="">Post Title:</label>
              <input type="text" value="{{$product->title}}" name="title" placeholder="Write a Title" required="">
        </div>
      <div class="col-12 m-auto">

          <label for="">Post Description:</label>
          <input type="text" value="{{$product->description}}" name="description" placeholder="Write a Description" required="">
        </div>
      <div class="col-12 m-auto">

          <label for="">Post Price:</label>
          <input type="number" value="{{$product->price}}" name="price" placeholder="Set a Price" required="">
        </div>
      <div class="col-12 m-auto">

          <label for="">Post Quantity:</label>
          <input type="number" value="{{$product->quantity}}" name="quantity" min="0" placeholder="Set a Quintity" required="">
        </div>
      <div class="col-12 m-auto">

          <label for="">Discount Price:</label>
          <input type="number" value="{{$product->discount_price}}" name="dis_price" placeholder="Set a Discount Price if Apply:" >
        </div>
        <div class="col-12 m-auto">

          <label for="">Post Category:</label>
          <select value="" name="category" id="category" required>
              <option value="{{$product->category}}">{{$product->category}}</option>
       
          @foreach($category as $categoryOption)
                <option value="{{ $categoryOption->category_name }}">{{ $categoryOption->category_name }}</option>
            @endforeach
            </select>
        </div>
        <div class="col-12 m-auto">
          <label for="">Current Product Image:</label>
          <img class="w-50 h-25" src="/product/{{ $product->image }}" alt="">
          
          <label for="">Update Product Image:</label>
          <input class="mt-3" type="file" name="image">
      </div>
      
        <div class="col-7 m-auto ">
            
          <input class="btn btn-primary mt-4" value="Update Product" type="submit">
        </div>
      </form>
      </div>
    </div>
    
    <!-- content-wrapper ends -->
      @include('adminmain.footer')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
  @include('adminmain.jstags')