<!-- resources/views/applyCoupon.blade.php -->

@extends('layouts.app') <!-- Adjust based on your layout file -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Apply Coupon</div>

                    <div class="card-body">
                        <form action="{{ route('coupon.apply') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="coupon_code">Coupon Code</label>
                                <input type="text" name="coupon_code" id="coupon_code" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Apply Coupon</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
