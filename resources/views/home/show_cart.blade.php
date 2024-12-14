@include('main.header')
@if(session()->has('message'))
<div class="alert alert-success">
   {{session()->get('message')}}
</div>
@endif
<style>
    table,th,td{
border: 1px solid gray
    }
    th{
        font-size: 20px;
        padding: 10px;
        background-color: aqua;
    }
</style>


    <table class="col-11 m-auto text-center">
        <tr >
        <th>Product Title</th>
        <th>Product Quantity</th>
        <th>Product Price</th>
        <th>Product Size</th>
        <th>Product Image</th>
        <th>Action</th>
    </tr>
    <?php $totalprice=0 ?>
    @foreach ($cart as $item)

    <tr >
        <td>{{$item->product_title}}</td>
        <td>
            <!-- Input field for quantity -->
            <form action="{{ route('update_cart_quantity', ['itemId' => $item->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Add your form fields for updating quantity -->
                <input type="number" style="width: 50%;height:40px" name="quantity" value="{{ $item->quantity }}">
                <button type="submit" class="btn btn-primary">Update Quantity</button>
            </form>


        </td>
        <td>
        {{$item->price}}
        </td>
        <td>


            <form action="{{ url('add_cart_size', $item->id) }}" method="POST" id="addToCartForm">
                @csrf
                @method('PUT') <!-- Add this line to simulate a PUT request -->
                <select class="btn alert-primary" name="size" id="size" onchange="submitForm()">
                    <option value="0" {{ $item->size == 0 ? 'selected' : '' }}>Small</option>
                    <option value="1" {{ $item->size == 1 ? 'selected' : '' }}>Medium</option>
                    <option value="2" {{ $item->size == 2 ? 'selected' : '' }}>Large</option>
                </select>
            </form>


        </td>
        <td><img class="" style="height: 150px;width:150px" src="/product/{{$item->image}}" alt=""></td>
        <td><a class="alert alert-danger" onclick="return confirm('Are you sure to remove the Product')" href="{{url('remove_cart',$item->id)}}">Remove Product</a></td>
    </tr>

    <?php $totalprice= $totalprice+$item->price*$item->quantity ?>
    @endforeach
</table>
<h1 class="text-center" id="totalPrice">Total Price: {{$totalprice}}</h1>
<div id="couponMessage" class="text-center"></div>

<!-- Button to toggle the coupon form -->
<button type="button" id="showCouponFormBtn" class="btn btn-primary w-50 m-auto">Apply Coupon</button>
{{-- <button onclick="updateCart()">Update Cart</button> --}}

<!-- Coupon application form (initially hidden) -->
<form action="{{ route('coupon.apply') }}" method="POST" id="applyCouponForm" style="display: none;">
    @csrf

    <div class="form-group col-3 m-auto">
        <label for="coupon_code" class="text-success ">Write Coupon Code</label>
        <input type="text" name="coupon_code" id="coupon_code" class="form-control" >
        <button type="submit" class="btn btn-primary">Apply Coupon</button>
    </div>
</form>


<h1 class="text-center">Proceed to Order</h1>
<div class="col-12   d-flex justify-content-center text-center">
    <a class="btn btn-success" href="{{url('cash_order')}}">Cash on Delivery <i style="font-size:20px" class="fa">&#xf0d6;</i></a>
    &nbsp;
    &nbsp;
    <a class="btn btn-info ms-3" href="{{url('stripe',$totalprice)}}">Pay Using Card <i style='font-size:20px' class='fab'>&#xf1f0;</i></a>
</div>


<br>

@include('main.subscribe')

<!-- footer start -->
@include('main.footer')
<!-- footer end -->
<script>
    document.getElementById('applyCouponForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the form from submitting

        // Get the coupon code from the form
        var couponCode = document.getElementById('coupon_code').value;

        // Make an AJAX request to apply the coupon and get the response
        fetch("{{ route('coupon.apply') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                coupon_code: couponCode
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                // If the coupon is applied successfully, update the total price
                var totalPriceElement = document.getElementById('totalPrice');
                var totalAmount = parseFloat("{{ $totalprice }}"); // Convert total price to a float

                // Subtract the discount amount
                var discountAmount = parseFloat(data.discount_amount);

                if (totalAmount >= discountAmount) {
                    // Apply the discount
                    var newTotal = totalAmount - discountAmount;

                    // Update the displayed total price
                    totalPriceElement.textContent = "Total Price: " + newTotal.toFixed(2);

                    // Display coupon applied message
                    var couponMessageElement = document.getElementById('couponMessage');
                    couponMessageElement.textContent = "Coupon applied successfully";
                    couponMessageElement.classList.add('text-success');
                } else {
                    // Display message if the total price is less than the discount amount
                    var couponMessageElement = document.getElementById('couponMessage');
                    couponMessageElement.textContent = "This coupon is not applicable for the current total price";
                    couponMessageElement.classList.add('text-danger');
                }
            } else {
                // Display coupon application error message
                var couponMessageElement = document.getElementById('couponMessage');
                couponMessageElement.textContent = "Invalid coupon code  try another one. ";
                couponMessageElement.classList.add('text-danger');
            }
        })
        .catch(error => {
            // Handle errors if the fetch fails
            console.error('Error:', error);
        });
    });
</script>
<script>
    document.getElementById('showCouponFormBtn').addEventListener('click', function () {
        // Toggle the visibility of the coupon form
        var couponForm = document.getElementById('applyCouponForm');
        couponForm.style.display = (couponForm.style.display === 'none' || couponForm.style.display === '') ? 'block' : 'none';
    });
</script>

@foreach ($cart as $item)
<script>
    function updateCart() {
        // Get all quantity input fields
        var quantityFields = document.getElementsByName('quantity[]');

        // Loop through each input field and update the quantity
        for (var i = 0; i < quantityFields.length; i++) {
            var newQuantity = parseInt(quantityFields[i].value);

            // You may want to perform additional validation on newQuantity
            // For example, ensure it is a positive integer

            // Update the quantity in your backend (use AJAX to send the new quantity to the server)
            // For simplicity, this example assumes you have a route for updating the quantity
            // You need to adapt this based on your Laravel routes and controllers
            fetch("{{ route('update_cart_quantity', ['itemId' => $item->id]) }}", {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    quantity: newQuantity
                })
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response if needed
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
</script>
@endforeach
<script>
    function submitForm() {
        console.log('Submitting form');
        var form = document.getElementById('addToCartForm');
        console.log('Selected size:', form.elements.size.value);
        form.submit();
    }
</script>


{{-- </script> --}}
@include('main/tagsjs')
