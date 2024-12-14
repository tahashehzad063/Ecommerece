<base href="/public">
@include('adminmain.csstags')
  </head>
  <style>
    label{
        display: inline-block;
        width: 300px;
        font-size: 25px;
        margin-top: 30px;
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
         <form action="{{url('send_user_email',$order->id)}}" method="POST">
            @csrf
             <h1 class="text-center">Send Email to {{$order->email}}</h1>
<div class="col-7 m-auto">

    <div class="col-4 ">
                 
                 <label for="">Email Greeting:</label>
                 <input type="text" name="greeting">
                </div>
             <div class="col-4 ">
                 
                 <label for="">Email FistListining:</label>
                 <input type="text" name="firstline">
                </div>
             <div class="col-4 ">
                 
                 <label for="">Email Body:</label>
                 <input type="text" name="body">
                </div>
             <div class="col-4 ">
                 
                 <label for="">Email Button Name:</label>
                 <input type="text" name="button">
                </div>
             <div class="col-4 ">
                 
                 <label for="">Email Url:</label>
                 <input type="text" name="url">
                </div>
                <div class="col-4 ">
                    
                    <label for="">Email Last Line:</label>
                    <input type="text" name="lastline">
                </div>
                <div class="col-12  mt-4">
                    <input type="submit" value="Send Email" class="btn btn-primary  p-2">
                </div>
                
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