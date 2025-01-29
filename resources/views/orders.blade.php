@extends('layout')

@section('content')
<h4>Checkout</h4>
<hr>
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
            <ul class="list-group">
                <li class="list-group-item"><b>{{ $details['product_name'] }}</b> &nbsp; x &nbsp; {{ $details['quantity'] }}
                    <span class="badge bg-secondary text-white" style="float: right;">${{ $details['price'] }}</span>
                </li>
            </ul>
            @endforeach
        @else
            <p>Cart is empty</p>
        @endif
        </div>
        <div class="card-footer">
            <b style="float: right">Total: <span class="text-info">${{ $total }} &thinsp;</span></b>
        </div>
    </div>
<br>
    <div>
        <a href="{{ route('cart') }}" class="btn btn-primary" style="float:left"> <i class="fa fa-arrow-left"></i>&nbsp; Back To Cart</a>
        <a href="{{ route('checkout') }}" class="btn btn-success" style="float:right"> <i class="fa-solid fa-dollar-sign"></i>&nbsp; Checkout</a>          
    </div>
</div>
<br><br><br><hr>

<h5>Your Orders</h5>
<hr>
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
        @php $total = 0 @endphp
        @if(session('orders'))
            @foreach(session('orders') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
            <ul class="list-group">
                <li class="list-group-item"><b>{{ $details['product_name'] }}</b> &nbsp; x &nbsp; {{ $details['quantity'] }}
                    <span class="badge bg-secondary text-white" style="float: right">${{ $details['price'] }}</span>
                </li>
            </ul>
            @endforeach
        @else
            <p>No orders yet</p>
        @endif
        </div>
        <div class="card-footer">
            <b style="float: right">Total: <span class="text-info">${{ $total }} &thinsp;</span></b>
        </div>
    </div>
    <br><br>
</div>
@endsection
