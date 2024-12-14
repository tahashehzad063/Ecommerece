
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
            <th>Coupon Code</th>
            <th>Coupon Name</th>
            <th>Coupon Description</th>
            <th>Coupon max_users</th>
            <th>Coupon type</th>
            <th>Discount Price</th>
            <th>	status </th>
        <th>starts_at </th>
            <th>expires_at </th>
            <th>Action</th>
        
        </tr>
        @foreach($product as $pro)
        <tr>
          <td>{{$pro->code}}</td>
          <td>{{$pro->name}}</td>
          <td>{{$pro->description}}</td>
          <td>{{$pro->max_uses}}</td>
          <td>{{$pro->type}}</td>
          <td>{{$pro->discount_amount	}}</td>
   <td>
    @if($pro->status == 1 && $pro->expires_at > now())
        Live
    @elseif($pro->expires_at < now()&& $pro->status==1)
        Expired
    @else
        Fixed
    @endif
</td>
{{-- <td>{{$pro->starts_at}}</td>
<td>{{$pro->expires_at}}</td> --}}

          <td>{{$pro->starts_at	}}</td>
          <td>{{$pro->expires_at	}}</td>
<td>   <a onclick="return confirm('Are you sure delete this post?')" class="mt-1  " href="{{url('delete_coupon',$pro->id)}}"><i class="fa fa-trash-o" style="font-size:25px;color:red"></i></a>
    <a href="{{url('edit_coupon',$pro->id)}}"><i class='far fa-edit' style='font-size:25px;color:skyblue'></i></a>
       
</td>

   </td>
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