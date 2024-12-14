
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
         <form action="{{ url('/coupons') }}" enctype="multipart/form-data" method="POST">

   @csrf
<div class="container-fluid">
    <div class="card">
        <div class="card-body">								
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Code</label>
                        <input type="text" name="code" id="code" placeholder="Coupon Code">	
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"  placeholder="Name">	
                    </div>
                </div>
              
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Max Uses</label>
                        <input type="text" name="max_uses" id="max_uses" placeholder="Max Uses">	
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email">Max_Uses_Users</label>
                        <input type="text" name="max_uses_users" id="max_uses_users"  placeholder="Max_uses_users">	
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email">Type</label>
                        <select name="type" id="type" >
                            <option value="1">Percent</option>
                            <option value="0">Fixed</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone">discount_amount</label>
                        <input type="text" name="discount_amount" id="discount_amount" placeholder="discount_amount">	
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone">min_amount</label>
                        <input type="text" name="min_amount" id="min_amount" placeholder="min_amount">	
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email">Status</label>
                        <select name="status" id="status" >
                            <option value="1">Active</option>
                            <option value="0">Block</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone">starts_at</label>
                        <input type="text" name="starts_at" id="starts_at"  placeholder="starts_at">	
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone">expires_at</label>
                        <input type="text" name="expires_at" id="expires_at"  placeholder="expires_at">	
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Description</label>
                        <textarea  name="description" id="description" cols="30" rows="10"></textarea>
                     </div>
                </div>
            </div>
        </div>							
    </div>
    <div class="pb-5 pt-3">
        <input type="submit" class="btn btn-primary" value="create data">
        <a href="#" class="btn btn-outline-dark ml-3" id="cancelButton">Cancel</a>
    </div>
</div>
<!-- /.card --> </form>
               
                      </div>
               
          <!-- content-wrapper ends -->
      @include('adminmain.footer')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    {{-- <script>
        $("#dicount_form")
    </script> --}}
    <script>
        document.getElementById('cancelButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default behavior of the link (e.g., navigating to a new page)
    
            // Clear form fields
            document.getElementById('code').value = '';
            document.getElementById('name').value = '';
            document.getElementById('max_uses').value = '';
            document.getElementById('max_uses_users').value = '';
            document.getElementById('status').value = 'percent';
            document.getElementById('discount_amount').value = '';
            document.getElementById('min_amount').value = '';
            document.getElementById('status').value = '1';
            document.getElementById('starts_at').value = '';
            document.getElementById('expires_at').value = '';
            document.getElementById('description').value = '';
    
            // You can also reset the form itself
            // document.getElementById('yourFormId').reset();
        });
    </script>
  @include('adminmain.jstags')