@include('main.header')
@include('sweetalert::alert')
<table class="m-auto  border border-primary text-center table-sortable"  style="width:90%">

    <tr>

        <th>Product Title</th>
        <th>Product Price</th>
        <th>Quantity </th>
        <th>Payment Status </th>
        <th>Delivery Status </th>
        <th>Image </th>
        <th>Cancel Order </th>


    </tr>
     @foreach($order as $pro)
    <tr>

    <td>{{$pro->product_title}}</td>
    <td>{{$pro->price}}</td>
    <td>{{$pro->quantity}}</td>
    <td>{{$pro->payment}}</td>
    <td>{{$pro->delivery_status}}</td>
    <td><img style="height: 150px;width:150px;" src="/product/{{$pro->image}}" alt="loding"></td>
    @if($pro->delivery_status == 'processing')
    <td><a onclick="confirmation(ev)" class="btn btn-danger" href="{{ url('cancel_order', ['id' => $pro->id]) }}">Cancel Order</a>
    </td>
@else
    <td class="text-success">Processing or Delivered</td>
@endif




    </tr>

    @endforeach
  </table>

 <script>
    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);
      swal({
          title: "Are you sure to cancel this product",
          text: "You will not be able to revert this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {



              window.location.href = urlToRedirect;

          }


      });


  }
 </script>
@include('main.subscribe')

<!-- footer start -->
@include('main.footer')
<!-- footer end -->
@include('main/tagsjs')
