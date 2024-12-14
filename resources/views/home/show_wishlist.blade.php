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
        {{-- <th>Product Quantity</th> --}}
        <th>Product Price</th>
        <th>Product Image</th>
        <th>Action</th>
    </tr>
    <?php $totalprice=0 ?>
    @foreach ($cart as $item)
    <form action="{{ url('add_to_cart',$item->id) }}" method="POST">
        @csrf
    <tr >
        <td>{{$item->product_title}}</td>
        <td>{{$item->price}}</td>
        <td><img class="" style="height: 150px;width:150px" src="/product/{{$item->image}}" alt=""></td>
        <td><a class="alert alert-danger" onclick="return confirm('Are you sure to remove the Product')" href="{{url('wishl',$item->id)}}">Remove Product</a>
            <a class="btn btn-primary" href="{{url('add_to_cart',$item->id)}}">Add to Cart</a>
            {{-- <input type="submit" class="btn btn-primary" value="Add all to Cart"> --}}
      </td>
    </tr>
  
</form>
    @endforeach
</table>



<br>

@include('main.subscribe')

<!-- footer start -->
@include('main.footer')

@include('main/tagsjs')