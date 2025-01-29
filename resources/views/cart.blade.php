@extends('layout')
   
@section('content')
<h4>Your Cart</h4><br>
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('img') }}/{{ $details['photo'] }}" height="100"/></div>
                            <div class="col-sm-9">
                                <h5>{{ $details['product_name'] }}</h5>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa-solid fa-trash fa-sm"></i>&nbsp; Remove</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total: ${{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-primary" style="float: left"> <i class="fa fa-arrow-left"></i>&nbsp; Continue Shopping</a>
                <a href="{{ route('orders') }}" class="btn btn-success"> Proceed To Checkout &nbsp;<i class="fa fa-arrow-right"></i></a>          
            </td>
        </tr>
    </tfoot>
</table>
@endsection
   
@section('scripts')
<script type="text/javascript">
   
   // --- CART QUANTITY ---
    $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "PATCH",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    // --- CART DELETE ---
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('remove_from_cart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id")
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
   
</script>
@endsection