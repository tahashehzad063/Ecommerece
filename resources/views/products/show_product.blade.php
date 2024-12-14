
@include('adminmain.csstags')
  </head>
  
  <body>
    <div class="container-scroller">
  @include('adminmain.sidebar')
      <div class="container-fluid page-body-wrapper">
     @include('adminmain.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
         @include('adminmain.upgrade')
         @if(session()->has('message'))
         <div class="alert alert-success">
            {{session()->get('message')}}
         </div>
         @endif
         {{-- Price --}}
      <table class="m-auto  border border-primary text-center"style="width:95%">
        <tr>
            <th>Product Title</th>
            <th>Product Description</th>
            <th>Product Category</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Discount Price</th>
            <th>Product Image </th>
            <th>Edit </th>
            <th>Delete </th>
        
        </tr>
        @foreach($product as $pro)
        <tr>
          <td>{{$pro->title}}</td>
          <td>{{$pro->description}}</td>
          <td>{{$pro->category}}</td>
          <td>{{$pro->quantity}}</td>
          <td>{{$pro->price}}</td>
          <td>{{$pro->discount_price}}</td>
          <td><img class="" style="height: 200px;width:200px;" src="/product/{{$pro->image}}" alt="Loading"></td>
          <td>
            <a href="{{url('edit_product',$pro->id)}}"><i class='far fa-edit' style='font-size:25px;color:skyblue'></i></a>
          </td>
          <td>

            <a onclick="return confirm('Are you sure delete this post?')" class="mt-1  " href="{{url('delete_product',$pro->id)}}"><i class="fa fa-trash-o" style="font-size:25px;color:red"></i></a>
          </td>
                          
        </tr>
        @endforeach
      </table>
      <br>
        <div class="col-1 m-auto">

          {{ $product->links() }}
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