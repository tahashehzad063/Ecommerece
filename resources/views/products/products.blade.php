
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
<form action="{{URL('add_product')}}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="col-12 m-auto">
    
              <label for="">Post Title:</label>
              <input type="text" name="title" placeholder="Write a Title" required="">
        </div>
      <div class="col-12 m-auto">

          <label for="">Post Description:</label>
          <input type="text" name="description" placeholder="Write a Description" required="">
        </div>
      <div class="col-12 m-auto">

          <label for="">Post Price:</label>
          <input type="number" name="price" placeholder="Set a Price" required="">
        </div>
      <div class="col-12 m-auto">

          <label for="">Post Quantity:</label>
          <input type="number" name="quantity" min="0" placeholder="Set a Quintity" required="">
        </div>
      <div class="col-12 m-auto">

          <label for="">Discount Price:</label>
          <input type="number" name="dis_price" placeholder="Set a Discount Price if Apply:" >
        </div>
        <div class="col-12 m-auto">

          <label for="">Post Category:</label>
          <select name="category" id="category" required>
            @foreach($category as $categoryOption)
                <option value="{{ $categoryOption->category_name }}">{{ $categoryOption->category_name }}</option>
            @endforeach
            </select>
        </div>
        <div class="col-12 m-auto">
          
            <label for="">Product Image:</label>
            <input type="file" name="image" required="">
        </div>
        <div class="col-7 m-auto ">
            
          <input class="btn btn-primary mt-4" value="Add Product" type="submit">
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