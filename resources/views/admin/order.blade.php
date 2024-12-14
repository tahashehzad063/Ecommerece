
@include('adminmain.csstags')
  </head>
  <style>
   th{
    margin: 30px;
    /* background-color: skyblue; */
    /* text:bla */
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
      <h1 class="text-center mb-3 "><u>All Orders</u></h1>
               <form action="{{url('search')}}" method="GET" class="mb-4 justify-content-end d-flex">
                @csrf
                <input type="text" placeholder="Search Product" name="search" class="">
                <input type="submit" value="Search" class="btn btn-primary ">
               </form>
      <table class="m-auto  border border-primary text-center table-sortable" >
        
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Quantity </th>
            <th>Payment Status </th>
            <th>Delivery Status </th>
            <th>Image </th>
            <th>Action </th>
            <th>Print PDF </th>
            <th>Send Email</th>
        
        </tr>
        @foreach($order as $pro)
        <tr>
        <td>{{$pro->name}}</td>
        <td>{{$pro->email}}</td>
        <td>{{$pro->address}}</td>
        <td>{{$pro->phone}}</td>
        <td>{{$pro->product_title}}</td>
        <td>{{$pro->price}}</td>
        <td>{{$pro->quantity}}</td>
        <td>{{$pro->payment}}</td>
        <td>{{$pro->delivery_status}}</td>
        <td><img style="height: 150px;width:150px;" src="/product/{{$pro->image}}" alt="loding"></td>
        @if($pro->delivery_status=='processing')
        <td><a onclick="return confirm('Are you sure the product is Delivered')" href="{{url('deliver',$pro->id)}}"class="btn btn-primary">Delivered</a></td>
        @elseif($pro->delivery_status=='Cancelled')
        <td><p class="text-danger">Cancelled By User</p></td>
        @else
       <td><p class="text-success pt-4"><i class="fa-solid fa-truck" style="font-size: 30px;"></i></p></td>
        @endif
        <td><a class="" href="{{url('print_pdf',$pro->id)}}"><i class="fa fa-print" style="font-size:30px;color:silver"></i></a></td>
        <td><a class="" href="{{url('send_email',$pro->id)}}"><i class="fa fa-envelope" style="font-size: 30px;color:green;" aria-hidden="true"></i></a></td>
        
        </tr>
        
        @endforeach
      </table>
      <br>
      <div class="col-1 m-auto">

        {{ $order->links() }}
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