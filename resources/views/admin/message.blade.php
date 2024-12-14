
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
      <h1 class="text-center mb-3 "><u>All Messages</u></h1>
               <form action="{{url('searching')}}" method="GET" class="mb-4 justify-content-end d-flex">
                @csrf
                <input type="text" placeholder="Search Product" name="search" class="">
                <input type="submit" value="Search" class="btn btn-primary ">
               </form>
      <table class="m-auto  border border-primary text-center table-sortable" style="width:70%">
        
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
          
        
        </tr>
   
        @foreach($order as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->message}}</td>
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