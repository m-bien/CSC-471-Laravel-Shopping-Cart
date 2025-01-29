@extends('layout')
   
@section('content')

<h4>Admin</h4>
<hr>
<a href="{{ url('http://localhost/phpmyadmin/index.php?route=/sql&db=laraveldb&table=products&pos=0') }}" class="btn btn-secondary" target="_blank" 
    style="float:left; margin-right: 12px;"><i class="fa fa-unlock fa-sm"></i>&nbsp; phpMyAdmin 
</a>
<a href="{{ url('/') }}" class="btn btn-primary"> Back To Home &nbsp;<i class="fa fa-arrow-right"></i></a>
<br>
<hr>
<h5>Manage Products</h5>

<table id="admin" class="table table-hover table-condensed table-striped">
    <thead>
        <tr>
            <th style="width:10%; vertical-align: middle;">#</th>
            <th style="width:20%; vertical-align: middle;">Product</th>
            <th style="width:20%; vertical-align: middle;">Description</th>
            <th style="width:20%; vertical-align: middle;">Price</th>
            <th style="width:40%; vertical-align: middle;">
            <a href="{{ route('admin.create') }}" class="btn btn-success btn-sm" style="float: left;">
                <i class="fa-solid fa-plus fa-sm"></i>&nbsp; New Product
            </a>            
        </th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <th class="align-middle">{{ $product->id }}</th>
                <td class="align-middle">{{ $product->product_name }}</td>
                <td class="align-middle">{{ $product->product_description }}</td>
                <td class="align-middle">${{ $product->price }}</td>
                <td class="align-middle">
                    <a href="{{ route('admin.update') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen fa-sm"></i>&nbsp; Edit</a>
                    
                    <!-- delete -->
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">
                            <i class="fa-solid fa-trash fa-sm"></i>&nbsp; Delete
                        </button>
                    </form>
                </td>
            </tr>        
            @endforeach
    </tbody>
</table>
@endsection
