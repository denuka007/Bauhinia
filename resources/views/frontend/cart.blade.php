@extends('layouts.front')

@section('title')
  My Cart
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top"
  <div class="container">
     <h6 class="mb-0 ms-2">Home/My Cart</h6>
  </div>
</div>

<div class="container my-3">
    <div class="card shadow product_data">
        @if ($cartitems->count() > 0)
        <div class="card-body">
            @php $total= 0; @endphp
            @foreach ( $cartitems as $item)
            <div class="row mb-2">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" height="70px" width="70px" alt="Image here">
                </div>
                <div class="col-md-3 my-auto">
                    <h6>{{ $item->products->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6> Rs {{ $item->products->selling_price }}</h6>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if( $item->products->qty >= $item->user_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width: 130px">
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->user_qty }}">
                        <button class="input-group-text increment-btn">+</button>
                    </div>
                    @php $total += $item->products->selling_price * $item->user_qty ; @endphp
                    @else
                    <h6>Out of Stock</h6>
                    @endif
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger delete-cart-item">Remove</button>
                </div>
            </div>
            @endforeach

        </div>
        <div class="card-footer">
            <h6>Total Price: Rs {{ $total }}</h6>
            <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end mb-2">Proceed to Checkout</a>
        </div>
        @else
        <div class="card-body text-center">
            <h2>Your Cart is Empty</h2>
            <a href="{{ url('category') }}">Continue Shopping</a>
        </div>
        @endif
    </div>
</div>


@endsection

@section('scripts')

<script>

$(document).ready(function () {

$('.delete-cart-item').click(function(e) {
e.preventDefault();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var prod_id = $(this).closest('.product_data').find('.prod_id').val();
$.ajax ({
    method: "POST",
    url: "delete-cart-item",
    data: {
        'prod_id':prod_id,

    },
    success: function (response) {

        window.location.reload();
        swal("", response.status,"success");

    }

});

});

});


</script>

@endsection
