@extends('layout')
    
@section('content')
     
<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3" style="margin-bottom:50px;">
            <div class="img_thumbnail product-list">
                <img src="{{ asset('img') }}/{{ $product->photo }}" alt="{{ $product->product_name }}">
                <div class="caption">
                    <h5>{{ $product->product_name }}</h5>
                    <p>{{ $product->product_description }}</p>
                    <p><strong>Price: </strong> ${{ $product->price }}</p>
                    <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center">Add To Cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
     
@endsection