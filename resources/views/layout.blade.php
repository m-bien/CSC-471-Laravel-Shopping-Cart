<!DOCTYPE html>
    <!--- inspo: Cairocoders: https://youtu.be/TvFMI8rhQpA?si=jQJ2eGbPV7ABKr4R --->
<html>
<head>
    <title>mrgood | Laravel Shopping Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script><link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
        
        <a href="{{ route('admin') }}"><button class="btn btn-secondary">
            <i class="fa-solid fa-lock fa-sm"></i>&nbsp; Admin
        </button></a>

            <div class="dropdown">
                <button type="button" class="btn btn-primary" data-toggle="dropdown">
                    <i class="fa-solid fa-cart-shopping fa-sm" aria-hidden="true"></i>&nbsp; Cart 
                    <span class="badge rounded-pill bg-danger">
                    @php
                        $totalQuantity = 0;
                        foreach ((array) session('cart') as $id => $details) {
                            $totalQuantity += $details['quantity'];
                        }
                    @endphp
                    {{ $totalQuantity }}     
                    </span>
                </button>
 
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p><b>Total: <span class="text-info">${{ $total }}</span></b></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ asset('img') }}/{{ $details['photo'] }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['product_name'] }}</p>
                                    <span class="price text-info" style="font-size:14px"> ${{ $details['price'] }}</span>
                                    <span class="count" style="font-size:14px">x &nbsp; {{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Go To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
<br/>
<div class="container">
   
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
   
    @yield('content')
</div>
   
@yield('scripts')
</body>
</html>