@extends('layout')
   
@section('content')

<h4>Admin</h4>
<hr>
<h5>Add Product</h5>
<hr>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    
    <div class="form-group">
        <label for="product_name">Product Name <span style="color: red;">*</span></label>
        <input type="text" name="product_name" id="product_name" class="form-control" required>
    </div>
    <div class="form-group">
    <label for="product_description">Category <span style="color: red;">*</span></label>
        <textarea name="product_description" id="product_description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price <span style="color: red;">*</span></label>
        <input type="text" name="price" id="price" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="photo">Photo <span style="color: red;">*</span></label><br>
        <input type="file" name="photo" id="photo" required>
    </div>
    <button type="submit" class="btn btn-success">Add Product</button>
</form>
<br>
@endsection