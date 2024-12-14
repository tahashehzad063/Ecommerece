<base href="/public">
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
         <form action="{{url('update_post',$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
         
            
            
            
        <div class="col-12 ">
               <h1 class="text-center fw-bold">Update Caategory</h1>
            <h1>Name</h1> <input class=" w-100" style="height: 42px" type="text" name="title" id="title" value="{{$post->category_name}}">
        
      
        <input class="mt-5 btn btn-primary" name="submit" type="submit">
        </div>
        </form>
               
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