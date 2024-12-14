
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
         {{-- Price --}}
         @if(session()->has('message'))
         <div class="alert alert-success">
            {{session()->get('message')}}
         </div>
         @endif
    <div class="col-4 m-auto">
        <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Add Category</h1>
      <form action="{{url('add_category')}}" method="POST">
        @csrf
        <input type="text" name="category" placeholder="Write Category Name">
        <input type="submit" class="btn btn-primary" value="Add Category">
      </form><br>
    </div>
               <table class="m-auto w-50 " style="text-align: center; border:3px solid white; ">
                <tr>
                  <td>Category Name</td>
                  <td>Action</td>
                </tr>
                @foreach ($category as $categories)
                <tr>
                      
                  <td>{{$categories->category_name}}</td>
                  {{-- <td>{{$categories->id}}</td> --}}
                  <td><a onclick="return confirm('are you sure')" class=" mt-3 mb-3" href="{{url('delete_category',$categories->id)}}"><i class="fa fa-trash-o" style="font-size:30px;color:red"></i></a></td>
                  <td><a  class=" mt-3 mb-3" href="{{url('edit_category',$categories->id)}}"><i class='fas fa-edit' style='font-size:30px;color:skyblue'></i></a></td>
                </tr>
                @endforeach
               </table>
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